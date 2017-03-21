<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_type',
        'linkedin',
        'resume',
        'website',
        'glassdoor',
        'jobpost_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];












    /*-------------------------------------------
                        jobposts
    ---------------------------------------------*/
    /*
     *
     *
     *
    */
    public function jobposts()
    {
      return $this->hasMany('App\Jobpost', 'user_id');
    }
    // ------------------------------------------------








    // *********************************************











    /*--------------------------------------------
                    applied
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function applied()
    {
      return $this->belongsToMany('App\Jobpost', 'job_user', 'user_id', 'jobpost_id');
    }
    //-------------------------------------------------








    //*************************************************











    /*--------------------------------------------
                    checkIfApplied
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function checkIfApplied($job_id)
    {
      $applied = $this->applied->where('id', $job_id)->first();
      if(!$applied){return false;}
      return true;
    }
    //-------------------------------------------------








    //*************************************************










    /*--------------------------------------------
                    jobPostApi
    --------------------------------------------*/
    /**
     *
     *
     *
    */
    public function jobPostApi()
    {
        return $this->jobposts;
    }
    //-------------------------------------------------








    //*************************************************
}
