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

                  @foreach(Auth::user()->jobposts as $job)
                  <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ substr($job->description, 0, 100) }}...</td>
                    <td>${{ $job->salary }}</td>
                    <td>{{ $job->views }}</td>
                    <td> <a href="/applicants/{{ $job->id }}">{{ $job->applicants->count() }}</a></td>
                    <td>{{ $job->created_at  }}</td>
                  </tr>
                  @endforeach

                </tbody>

              </table>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(".button_tab").click(function(e){
    e.preventDefault();
    var value = $(this).attr('data-target');
    $(".button_tab").removeClass('active');
    $(this).addClass("active");

    $(".tab_selectable").hide();
    $("#"+value).show();
  });
</script>
@endsection
