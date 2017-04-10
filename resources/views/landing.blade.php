@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="container" id="app">
	<div style="margin:16px;">
        	<p><b>Admin:</b> testadmin1@email.com<br /> <b>Password:</b> abc123</p>
		<hr />
		<p><b>User:</b> testuser1@email.com <br /> <b>Password:</b> abc123</p>
        </div>
      <input type="text" class="form-control" placeholder="Search Jobs" v-model="searchQuery">
      <div class="container_design">
        <div id="loader">
            Loading...
        </div>
        <div id="jobs_container" style="display:none;">
            <ul>
              <li v-for="job in filteredJobs">
                <a v-bind:href="'/job/'+job.id">@{{ job.description_sum }}</a>
                <p>@{{ job.description | summary }} <br />
                  @{{ job.location }}
                </p>
              </li>
            </ul>
        </div>
      </div>
    </div>
@endsection


@section('scripts')
<script type="text/javascript">
  $.get('/api/alljobs', function(response){
    var app = new Vue({
      el: "#app",
      data: {
        jobs: response,
        searchQuery: ''
      },
      filters: {
        summary: function(value){
          return value.substring(1, 200);
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

    $("#loader").hide();
    $("#jobs_container").show();
  });
</script>
@endsection
