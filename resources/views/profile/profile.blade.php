@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">


      <div class="container_design">
        <h1 class="text-center">{{ $user->name }}</h1>
        <div>
          <h3 class="text-center">Profile</h3>
          <h4>About</h4>
          <p>{{ $user->about }}</p>
          <ul>
            <li>{{ $user->linkedin }}</li>
            <li>{{ $user->website }}</li>
            <li>{{ $user->email }}</li>
            <li>{{ $user->phone }}</li>
            <li><a href="{{ asset('storage/resumes/'.$user->resume) }}">Resume</a></li>
          </ul>
        </div>
      </div>

    </div>
@endsection
