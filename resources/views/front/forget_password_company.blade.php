@extends('front.layout.app') @section('main_content') @section('seo_title'){{$pageotheritem->forget_password_page_title}}@endsection @section('meta_description'){{$pageotheritem->forget_password_page_meta_description}}@endsection

<div class="page-top" style="background-image: url('uploads/banner.jpg');">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$pageotheritem->forget_password_page_heading}}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <form action="{{ route('forget_password_company_submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Submit
                            </button>
                            <a href="{{route('login')}}" class="primary-color">Back to Login Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
