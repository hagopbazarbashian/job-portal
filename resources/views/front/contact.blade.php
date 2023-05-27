@extends('front.layout.app')
@section('main_content')
@section('seo_title'){{$contact->title}}@endsection
@section('meta_description'){{$contact->meta_description}}@endsection

<div class="page-top" style="background-image: url('uploads/banner.jpg');">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$contact->heading}}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                    <form action="{{route('submit_contact')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="person_name"/>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="person_email" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control" rows="3" name="person_message"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {!!$contact->map_code!!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
