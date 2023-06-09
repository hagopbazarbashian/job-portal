@extends('front.layout.app')
@section('main_content')
@section('seo_title'){{$term->title}}@endsection
@section('meta_description'){{$term->meta_description}}@endsection
<div
class="page-top" style="background-image: url('uploads/banner.jpg')">
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$term->heading}}</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>
                {!!$term->content!!}
            </p>
        </div>
    </div>
</div>
</div>
@endsection
