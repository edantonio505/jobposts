@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container_design">
      <h1 class="text-center">{{ $job->title }}</h1>
      <h3 class="text-center">{{ $job->description_sum }}</h3>
      <div class="">

          <p><a href="{{ $job->user->linkedin }}">Linkedin</a></p>
          <p><a href="{{ $job->user->website }}">website</a></p>
          <p>email: {{ $job->user->email }}</p>
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
