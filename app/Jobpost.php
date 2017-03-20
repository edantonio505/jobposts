<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{









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









      /*-------------------------------------------
                          applicants
      ---------------------------------------------*/
      /*
       *
       *
       *
      */
      public function applicants()
      {
        return $this->hasMany('App\Applicant', 'applicant_id');
      }
      // ------------------------------------------------








      // *********************************************
}
