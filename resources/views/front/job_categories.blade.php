@extends('front.layout.app')
@section('main_content')
@section('seo_title'){{$pagejobcategory->title}}@endsection
@section('meta_description'){{$pagejobcategory->meta_description}}@endsection
<div class="page-top" style="background-image: url('uploads/banner.jpg')">
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$pagejobcategory->heading}}</h2>
        </div>
    </div>
</div>
</div>

<div class="job-category">
    <div class="container">
        <div class="row">
        @foreach ($jobCategorys as $jobCategory)
          <div class="col-md-4">
             <div class="item">
                <div class="icon">
                   <i class="{{ $jobCategory->icon }}"></i>
                </div>
                <h3>{{ $jobCategory->name }}</h3>
                <p>(5 Open Positions)</p>
                <a href=""></a>
             </div>
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
