<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use File;

class FileUploader extends Controller
{
    public static function fileupload(Request $request,$inputName,$fieldname='file',$path="")
    {

        $file= ($path != 'Guides/')? $request->file($inputName): $request->file('file_data')[$inputName];
        
        $fileRename = ($path != 'Guides/')?$request->user()->id.'_'.$fieldname.'.'.$file->extension() : $fieldname.'.'.$file->extension();

        $fileGet = public_path('Storage/'.$path.$fileRename);
        if(File::exists($fileGet)){
            File::delete($fileGet);
        }
        $file->move('storage/'.$path,$fileRename);

        
        return $fileRename;
    }
}