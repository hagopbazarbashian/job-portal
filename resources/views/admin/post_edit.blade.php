@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('button')
<div>
    <a href="{{ route('admin_post') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Show All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_update',$post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing photo</label>
                            <div>
                                <img src="{{asset('uploads/'.$post->photo)}}" alt="" class="w_150">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug *</label>
                            <input type="text" class="form-control" name="slug" value="{{ $post->slug }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Discription *</label>
                            <textarea name="short_discription" class="form-control editor" cols="30" rows="10">{!! $post->short_discription !!}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Discription *</label>
                            <textarea name="discription" class="form-control editor" cols="30" rows="10">{!! $post->discription !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
