@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
      <h1 class="text-center">What type of user</h1>
      <div class="profile_type_container">
        <form class="" action="/change_user_type" method="post">
          {{ csrf_field() }}
          <div class="row text-center bottom_space" >
            <!-- col -->
              <div class="col-md-6">
                <div class="div_center">
                  <div class="select_option" data-target="2">
                    <div>
                        <label class="" for="">Employee</label>
                    </div>
                  </div>

                </div>
              </div>
              <!-- col -->

              <!-- col -->
              <div class="col-md-6">
                  <div class="div_center">
                    <div class="select_option" data-target="1">
                      <div>
                      <label for="">Employer</label>
                      </div>
                    </div>

                  </div>
              </div>
              <!-- col -->
          </div>
          <!-- end Row -->
          <input type="hidden" id="profile_type" name="profile_type" value="">
          <input type="submit" value="Select" class="btn btn-block btn-primary">
        </form>
      </div>
    </div>
@endsection


@section('scripts')
<script type="text/javascript">
  $(".select_option").click(function(){
    var value = $(this).attr('data-target');
    $(".select_option").removeClass('selected-option');
    $(this).addClass('selected-option');
    $("#profile_type").val(value);
  });
</script>
@endsection
