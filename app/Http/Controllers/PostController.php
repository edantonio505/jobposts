<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jobpost;
use Elasticsearch\ClientBuilder;
use App\User;

class PostController extends Controller
{

    /*--------------------------------------------

    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function createPost()
    {
      return view('posts.create_post');
    }
    //-------------------------------------------------








    //*************************************************









    /*--------------------------------------------
                    postCreatePost
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function postCreatePost(Request $request)
    {
      $jobpost = new Jobpost();
      $jobpost->description = $request->input('description');
      $jobpost->salary = $request->input('salary');
      $jobpost->title = $request->input('title');
      Auth::user()->jobposts()->save($jobpost);
      return redirect('/profile');
    }
    //-------------------------------------------------








    //*************************************************









    /*--------------------------------------------
                    postDetail
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function postDetail($id)
    {
      $job = Jobpost::findOrFail($id);
      if(Auth::user()->id != $job->user->id)
      {
        $job->views = intval($job->views) + 1;
        $job->save();
      }
      return view('posts.post_detail', ['job' => $job]);
    }
    //-------------------------------------------------








    //*************************************************









    /*--------------------------------------------
                    apply
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function apply($job_id)
    {
      Auth::user()->applied()->attach([$job_id]);
      return redirect()->back();
    }
    //-------------------------------------------------








    //*************************************************









    /*--------------------------------------------
                    applicants
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function applicants($job_id)
    {
      $job = Jobpost::findOrFail($job_id);
      $applicants = $job->applicants;
      return view('posts.applicants', ['users' => $applicants, 'job' => $job]);
    }
    //-------------------------------------------------








    //*************************************************








    /*-----------------------------------------------
                        postsApi
    ------------------------------------------------*/
    /*
     *
     *
     *
    */
    public function postsApi($id)
    {
          $jobs = User::findOrFail($id)->jobposts;
          return response()->json($jobs);
    }
    # -----------------------------------------------









    //************************************************
}
