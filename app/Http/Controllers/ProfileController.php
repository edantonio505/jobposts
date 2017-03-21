<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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
      if($user->profile_type == 1){return view('profile.employer', ['user' => $user]);}
      if($user->profile_type == 2){return view('profile.profile', ['user' => $user]);}
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









    /*--------------------------------------------
                    editProfile
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function editProfile($id)
    {
      return view('profile.editProfile');
    }
    //-------------------------------------------------








    //*************************************************









    /*--------------------------------------------
                    postEditProfile
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function postEditProfile($id, Request $request)
    {
      $user = Auth::user();
      $filename = '';
      if($request->hasFile('resume'))
      {
        $file = $request->file('resume');
        $filename = md5($user->name.time()).".".$file->extension();
        $file->storeAs('resumes', $filename, 'public');
      }

      $user->website = $request->input('website');
      $user->linkedin = $request->input('linkedin');
      $user->resume = $request->input('resume');
      $user->about = $request->input('about');
      $user->phone = $request->input('phone');
      $user->resume = $filename;
      $user->save();
      return redirect('/profile');
    }
    //-------------------------------------------------








    //*************************************************









    /*--------------------------------------------
                    applicantProfile
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function applicantProfile($id)
    {
      $user = User::findOrFail($id);
      return view('profile.user_profile',['user' => $user]);
    }
    //-------------------------------------------------








    //*************************************************
}
