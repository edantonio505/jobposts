@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container_design">
      <h1 class="text-center">Create Job Post</h1>

      <div>
        <a href="/profile" class="btn btn-danger">Cancel</a>
        <form action="/create_post" method="post">

          {{ csrf_field() }}
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
          </div>

          <div class="form-group">
            <label for="description_sum">Description Summary</label>
            <input type="text" class="form-control" name="description_sum" />
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="5" cols="20"></textarea>
          </div>
          <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" name="salary">
          </div>

          <input type="submit" class="btn btn-primary btn-block"  value="Create Post">
        </form>
      </div>
    </div>
</div>
@endsection
