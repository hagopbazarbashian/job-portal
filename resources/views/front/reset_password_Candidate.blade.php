@extends('front.layout.app')
@section('main_content')

<div class="page-top" style="background-image: url('uploads/banner.jpg');">
  <div class="bg"></div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <h2>Reset Password</h2>
          </div>
      </div>
  </div>
</div>

<div class="page-content">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
              <div class="login-form">
                  <form action="{{ route('resetpassword_candidate_submit',[$Candidate_data->token,$Candidate_data->email]) }}" method="post">
                      @csrf
                      <div class="mb-3">
                          <label for="" class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" />
                      </div>
                      <div class="mb-3">
                          <label for="" class="form-label">Retype Password</label>
                          <input type="password" class="form-control" name="retype_password" />
                      </div>
                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary bg-website">
                              Update
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
