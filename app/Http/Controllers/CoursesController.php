<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public static function readFile(){
        $fileData = [];

        if(($open=fopen(storage_path().'/Data/courses.csv','r')) !== false){
            while (($row = fgetcsv($open,1000,',')) !== false) {
                $fileData[] = $row;
            }
            fclose($open);
        }
        return $fileData;
    }
}