<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
  protected $fillable = ['user_id'];













  /*-------------------------------------------
                      jobpost
  ---------------------------------------------*/
  /*
   *
   *
   *
  */
  public function jobpost()
  {
    return $this->belongsTo('App\Jobpost');
  }
  // ------------------------------------------------








  // *********************************************
}
