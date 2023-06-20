<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FetchBuddies;

class BuddyController extends Controller
{
    //
    public function getBuddyDetails(Request $request)
    {
        $buddyId = $request->id;
        // return $buddyId;
        $user = FetchBuddies::findOrFail($buddyId);
        $returnData = "<option value='$user->id'>$user->otherNAMES</option>";
        return $returnData;
    }
}
