@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="container">
      <div class="container_design">
        <div>
            <ul>
              @foreach($jobposts as $job)
                <li>
                  <a href="/job/{{$job->id}}">{{$job->title}}   {{ $job->description_sum }}</a> 
                </li>
              @endforeach

            </ul>
        </div>
      </div>
    </div>
@endsection
