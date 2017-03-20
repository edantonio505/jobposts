@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
      <div class="edit_profile_container">
        <h1 class="text-center"> Edit Profile</h1>
        <form method="post" action="/profile/{{ Auth::user()->id }}/edit">
          {{ csrf_field() }}
        <div style="padding:15px;">
          <div class="form-group">
            <label for="linked">LinkedIn</label>
            <input type="text" class="form-control" name="linkedin"
            @if(Auth::user()->linkedin != '')
              value="{{Auth::user()->linkedin}}"
            @endif
            >
          </div>


          <div class="form-group">
            <label for="webiste">Website</label>
            <input type="text" class="form-control" name="website"
            @if(Auth::user()->website != '')
              value="{{Auth::user()->website}}"
            @endif
            >
          </div>


          <input type="submit" class="btn btn-block btn-primary" value="Edit Profile">
        </div>

        </form>
      </div>
    </div>
@endsection
