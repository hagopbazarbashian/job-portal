@extends('front.layout.app')
@section('main_content')
@section('seo_title'){{$privacy->title}}@endsection
@section('meta_description'){{$privacy->meta_description}}@endsection
<div
class="page-top" style="background-image: url('uploads/banner.jpg')">
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$privacy->heading}}</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                {!!$privacy->content!!}
            </p>
        </div>
    </div>
</div>
</div>
@endsection
