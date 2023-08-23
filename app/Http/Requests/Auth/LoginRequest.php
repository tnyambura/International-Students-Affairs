<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\sessionUpdate;
use Session;
use DB;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Su_Id_or_Email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(Request $request){
        $this->ensureIsNotRateLimited();

            $user = DB::table('users')->where('id',$this->input('Su_Id_or_Email'))->orWhere('email',$this->input('Su_Id_or_Email'))->limit(1)->get();
            
            if(sizeOf($user) > 0){
                $credentials = array('id'=>$user[0]->id,'password'=>$this->input('password'));
                if($user[0]->status === 1){
                    if(!Auth::attempt($credentials)){
                        RateLimiter::hit($this->throttleKey());
                        
                        throw ValidationException::withMessages([
                            'fail'=>"Credentials do not match any user"
                        ]);
                    }else{
                            RateLimiter::clear($this->throttleKey());
                        }
                }else{
                    throw ValidationException::withMessages([
                        'fail'=>"User found but not activated. Kindly contact the admin to activate the account"
                    ]);
                }
            }else{
                throw ValidationException::withMessages([
                    'fail'=>"User not found, register to get access"
                ]);
            }
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(){
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'id' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('Su_Id_or_Email')).'|'.$this->ip();
    }
}
