<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{









    /*-------------------------------------------
                        index
    ---------------------------------------------*/
    /*
     *
     *
     *
    */
    public function index()
    {
      $user = Auth::user();
      if($user->profile_type == 1){return view('profile.employer');}
      if($user->profile_type == 2){return view('profile.profile');}
      return view('profile.type');
    }
    // ------------------------------------------------








    // *********************************************









    /*-------------------------------------------
                        cahngeType
    ---------------------------------------------*/
    /*
     *
     *
     *
    */
    public function changeType(Request $request)
    {
      $type = $request->input('profile_type');
      Auth::user()->profile_type = $type;
      Auth::user()->save();
      return redirect('/profile');
    }
    // ------------------------------------------------








    // *********************************************
}
