@extends('admin.layout.app')

@section('heading', 'Contact Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_contact_update',$contact->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{$contact->heading}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Map Code</label>
                            <textarea name="map_code" class="form-control h_100" cols="30" rows="10">{!!$contact->map_code!!}</textarea>
                        </div>
                        <h4 class="seo_section">Seo Section</h4>
                        <div class="form-group mb-3">
                            <label>Title </label>
                            <input type="text" class="form-control" name="title" value="{{$contact->title}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Meta Description </label>
                            <textarea name="meta_description" class="form-control h-100" cols="30" rows="10">{!!$contact->meta_description!!}</textarea>
                        </div>
                        <div class="form-group">
                            <button  class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
