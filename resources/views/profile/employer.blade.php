@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
      <div style="
        background-color:white;
        min-height:400px;
        margin-top:30px;
        border:1px solid #d3e0e9;
        border-radius: 10px;">
        <div style="padding:15px;">
            <h1 style=" text-align:center;">Employer profile</h1>
            <ul class="nav nav-tabs">
              <li role="presentation" data-target="profile" class="button_tab active"><a href="#">Profile Details</a></li>
              <li role="presentation" data-target="job_posts" class="button_tab"><a href="#">Job Posts</a></li>
            </ul>
            <div id="profile" class="tab_selectable">
              <div style="margin-top:15px;">
                  {{ Auth::user()->name }}<br />
                  {{ Auth::user()->website }}<br />
                  {{ Auth::user()->linkedin }}
              </div>
            </div>


            <div id="job_posts" class="tab_selectable" style="display:none;">

              <div style="align-text:left; width: 100%; margin-top:15px;">
                  <a href="/create_post" class="btn btn-primary">Create Job Post</a>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Views</th>
                    <th>Applicants</th>
                    <th>Date Added</th>
                  </tr>

                </thead>
                <tbody>
                  <tr v-for="job in jobs">
                    <td>@{{ job.title }}</td>
                    <td>@{{ job.description | summary }}...</td>
                    <td>@{{ job.salary }}</td>
                    <td>@{{ job.views }}</td>
                    <td><a v-bind:href="'/applicants/'+job.id" >@{{ job.applicants.length }}</a></td>
                    <td>@{{ job.created_at | date }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">





  /*---------------------------------------------------------------
                    `CHANGING TABS
  ------------------------------------------------------------*/
  $(".button_tab").click(function(e){
    e.preventDefault();
    var value = $(this).attr('data-target');
    $(".button_tab").removeClass('active');
    $(this).addClass("active");

    $(".tab_selectable").hide();
    $("#"+value).show();
  });
// -------------------------------------------------------------





/*---------------------------------------------------------------
                  `CHANGING TABS
------------------------------------------------------------*/
function renderJobs(response)
{
  // console.log(response);
  var app = new Vue({
    el: "#job_posts",
    data: {
      jobs: response
    },
    filters: {
      date: function(value){
        date = value.split(' ')[0].split('-');
        result = date[1]+'/'+date[2]+'/'+date[0];
        return result;
      },
      summary: function(value){
        return value.substring(1, 60);
      }
    }
  });

}
// ------------------------------------------------------------








/*---------------------------------------------------------------
                    Getting Jobs
------------------------------------------------------------*/
  $.get('/api/jobposts/{{ $user->id }}', function(response){
    renderJobs(response);
  });
// -------------------------------------------------------

</script>
@endsection
