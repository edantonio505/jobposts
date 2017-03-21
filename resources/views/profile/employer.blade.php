@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <style media="screen">
        .sortable {
          color: #3097D1;
          cursor:pointer;
        }
    </style>

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
              <li role="presentation" data-target="profile" class="button_tab"><a href="#">Profile Details</a></li>
              <li role="presentation" data-target="job_posts" class="button_tab active"><a href="#">Job Posts</a></li>
            </ul>
            <div id="profile" class="tab_selectable" style="display:none;">
              <div style="margin-top:15px;">
                  Name: {{ Auth::user()->name }}<br />
                  Website: {{ Auth::user()->website }}<br />
                  Linkedin: {{ Auth::user()->linkedin }}
              </div>
            </div>


            <div id="job_posts" class="tab_selectable">

              <div style="align-text:left; width: 100%; margin-top:15px;">
                  <a href="/create_post" class="btn btn-primary">Create Job Post</a>
              </div>
              <div style="float:right; position:relative; top: -35px;">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <input v-model="searchQuery" />
              </div>


              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="sortable" v-on:click="sortBy('title', filteredJobs)">Title</th>
                    <th>Description</th>
                    <th class="sortable" v-on:click="sortBy('salary', filteredJobs)">Salary</th>
                    <th class="sortable" v-on:click="sortBy('views', filteredJobs)">Views</th>
                    <th class="sortable" v-on:click="sortBy('applicants', filteredJobs)">Applicants</th>
                    <th class="sortable" v-on:click="sortBy('created_at', filteredJobs)">Date Added</th>
                  </tr>

                </thead>
                <tbody>
                  <tr v-for="job in filteredJobs" v-on:click="checkJobpost(job.id)">
                    <td>@{{ job.title }}</td>
                    <td>@{{ job.description | summary }}...</td>
                    <td>@{{ job.salary }}</td>
                    <td>@{{ job.views }}</td>
                    <td>@{{ job.applicants.length }}</td>
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


var filterInt = function(value) {
if (/^(\-|\+)?([0-9]+|Infinity)$/.test(value))
  return Number(value);
return NaN;
}


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
                  Render Jobs
------------------------------------------------------------*/
function renderJobs(response)
{
  // console.log(response);
  var app = new Vue({
    el: "#job_posts",
    data: {
      searchQuery: '',
      jobs: response
    },
    methods: {
      checkJobpost: function(id){
        window.location.href = '/jobpost/'+id;
      },
      sortBy: function(key, filteredJobs){
      filteredJobs.sort(function(a,b)
        {
            if(key == 'salary' || key == 'views'){
              var numA = (a[key] != null ? a[key] : 0);
              var numB = (b[key] != null ? b[key] : 0);

              if(parseInt(numA,10) > parseInt(numB,10)){return filterInt(numA) -filterInt(numB);}
              if(parseInt(numA,10) < parseInt(numB,10)){return filterInt(numB) - filterInt(numA);}
            }

            if(key == 'title'){
              var nameA = a[key].toUpperCase();
              var nameB = b[key].toUpperCase();
              return nameA > nameB ? 1 : 0;
            }

            if(key == 'applicants'){
              var va = a[key].length;
              var vb = b[key].length;
              if(va > vb){return va - vb;}
              if(va < vb){return vb - va;}
            }

            if(key == 'created_at')
            {
              var dateA = Number(new Date(a[key]).getTime() / 1000);
              var dateB = Number(new Date(a[key]).getTime() / 1000);
              if((dateA) > dateB){return dateA - dateB;}
              if(dateA < dateB){return dateB - dateA;}
            }

        });
      }
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
    },
    computed: {
      filteredJobs: function(){
        var jobs = this.jobs;
        var searchQuery = this.searchQuery;
        if(searchQuery != '')
        {
          jobs = jobs.filter(function(job){
              return Object.keys(job).some(function (key) {
							         return String(job[key]).toLowerCase().indexOf(searchQuery.toLowerCase()) > -1;
				      })
          });
        }
        return jobs;
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
