@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
      <div style="
        background-color:white;
        min-height:400px;
        margin-top:30px;
        border:1px solid #d3e0e9;
        border-radius: 10px;
        box-shadow: 0px 0px 15px #bdbdbd !important;">
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
                  <button class="btn btn-primary">Create Job Post</button>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>Job</th>
                    <th>sdf</th>
                    <th>Age</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>
                  </tr>
                  <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>94</td>
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
