@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container_design">
      <h1 class="text-center">{{ $job->title }}</h1>
      <h3 class="text-center">{{ $job->description_sum }}</h3>
      <div>
        <a href="/profile" style="padding-bottom: 20px;">Go to Dashboard</a>
        <p class="margin-top:20px;">{{ $job->description }}</p>
        <h3>Salary: ${{ $job->salary }}</h3>

        <h2 class="text-center">Applicants</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Website</th>
              <th>Linkedin</th>
              <th>Phone</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>

            @foreach($users as $user)
            <tr class="applicant_row" data-target="{{ $user->id }}">
              <td>{{ $user->name }}</td>
              <td>{{ $user->website }}</td>
              <td>{{ $user->linkedin }}</td>
              <td>{{ $user->phone }}</td>
              <td>{{ $user->email }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
      $(".applicant_row").click(function(){
        var id = $(this).attr('data-target');
        window.location.href = '/applicant/'+id+'/profile';
      });
  </script>
@endsection
