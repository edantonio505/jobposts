@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container_design">
      <h1 class="text-center">{{ $job->title }}</h1>
      <div class="">

          <p><a href="{{ $job->user->linkedin }}">Linkedin</a></p>
          <p><a href="{{ $job->user->website }}">website</a></p>
          <p>{{ $job->description }}</p>
          <p>salary: ${{ $job->salary }}</p>
          @if(Auth::user()->profile_type == 2)
            <a href="/job/application/{{ $job->id }}" class="btn btn-primary
              {{ (Auth::user()->checkIfApplied($job->id) ) ? 'disabled' : '' }}
              ">Apply for this job</a>
          @endif
      </div>

    </div>
</div>
@endsection
