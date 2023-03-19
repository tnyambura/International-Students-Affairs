<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class FileUploader extends Controller
{
    public static function fileupload(Request $request,$inputName,$fieldname='file',$path="")
    {

        // $request->validate($request, [
        //     'filenames' => 'required',
        //     'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        // ]);

        $file=$request->file($inputName);
        $fileNameParts = explode('.', $file);
        $ext = end($fileNameParts);

        
        $fileRename = $request->user()->id.'_'.$fieldname.'_'.time().'.'.$file->extension();

        $file->move('storage/'.$path,$fileRename);
        
        return $fileRename;
        
        // $file=$request->file('passportPIC');



        // $this->validate($request, [
        //         'filenames' => 'required',
        //         'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        // ]);
        // if($request->hasfile('filenames'))
        //  {
        //     foreach($request->file('filenames') as $file)
        //     {
        //         $name = $request->user()->id.'_'.$rename.'_'.time().$file->extension();
        //         // $name = time().'.'.$file->extension();
        //         $file->move('storage/' .$path, $name);
        //         // $file->move(base_path() . '/storage/app/public', $name);
        //         $data[] = $name;
        //     }
        //  }


        //  $file= new File();
        //  $file->filenames=json_encode($data);
        //  $file->save();


        // return back()->with('success', 'Your files has been send successfully');
    }
}