@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
      <div class="container_design">
        <h1 class="text-center">{{ $user->name }}</h1>
        @if(Auth::user()->profile_type == 1)
          <a href="/profile" style="margin-left:15px;" class="btn btn-primary">Dashboard</a>
        @endif
        <div>
            <h4>About</h4>
            <p>{{ $user->about }}</p>
            <p>
              <a href="http://{{ $user->linkedin }}">Linkedin</a>
              &nbsp;&nbsp;&nbsp;
              <a href="http://{{ $user->website }}">{{ $user->website }}</a>
              &nbsp;&nbsp;&nbsp;
              {{ $user->phone }}
              &nbsp;&nbsp;&nbsp;
              {{ $user->email }}
              &nbsp;&nbsp;&nbsp;
              @if($user->resume != '')
                <a href="{{ asset('storage/resumes/'.$user->resume) }}">Resume</a>
              @endif
            </p>
        </div>
      </div>
    </div>
@endsection
