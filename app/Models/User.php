<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\Auth;
use DB;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'id',
        'surname',
        'other_names',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    // public function isActivated(){
    //     if($this->status === 1){
    //         return true
    //     }
    // }
    // public function roles(){

    // }

    public function hasRole($role){
        $hasrole = DB::table('user_roles')->where('user_id',Auth::user()->id)->where('role',$role)->get();
        if(sizeOf($hasrole) > 0){ return true;}
        return false;
    }
    

    public function isAdmin()
    {
        if($this->role === 'admin')
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }
    public function isSuperAdmin()
    {
        if($this->role === 'super_admin')
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }
    public function normalUser()
    {
        $user = Auth::user();

        $userRole = DB::table('roles')->where('user_id', '=',$user->id)->limit(1)->get()[0]->role;


        // $userRole = DB::table('roles')->where('user_id', '=',Auth::user()->id)->limit(1)->get();
        // if(1 !== 0){
        //     return true;
        // }
        if($userRole === 'student')
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
