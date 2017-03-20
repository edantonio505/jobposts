<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobpost;

class PagesController extends Controller
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
      $posts = Jobpost::all();
      return view('landing', ['jobposts' => $posts]);
    }
    // ------------------------------------------------








    // *********************************************
}
