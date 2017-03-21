<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Jobpost extends Model
{
  protected $fillable = [
    'description',
    'salary',
    'views',
    'title',
    'description_sum',
    'location'
  ];


  /*-------------------------------------------
                    user
  ---------------------------------------------*/
  /*
   *
   *
   *
  */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  // ------------------------------------------------







  // *********************************************












  /*--------------------------------------------
                  applicants
  --------------------------------------------*/
  /**
   *
   *
   *
  */
  public function applicants()
  {
    return $this->belongsToMany('App\User', 'job_user', 'jobpost_id', 'user_id');
  }
  //-------------------------------------------------








  //*************************************************
}
