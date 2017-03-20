@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container_design">
      <h1 class="text-center">{{ $job->title }} Applicants</h1>

      <div>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Website</th>
              <th>linkedin</th>
            </tr>
          </thead>
          <tbody>

            @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->website }}</td>
              <td>{{ $user->linkedin }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
