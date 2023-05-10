<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public static function readFile(){
        $fileData = [];

        if(($open=fopen(storage_path().'/courses.csv','r')) !== false){

            // $header = fgetcsv($file);
            while (($row = fgetcsv($open,1000,',')) !== false) {
                $fileData[] = $row;
                // $users[] = array_combine($header, $row);
            }
            fclose($open);
        }
        // $filePath = storage_path('app/users.csv');
        // $file = fopen($filePath, 'r');
        // print_r($fileData);
        return $fileData;
    }
}