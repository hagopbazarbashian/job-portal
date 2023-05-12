@extends('admin.layout.app')

@section('heading', 'Create Post')

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
                    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <div>
                                <input type="file" name="photo" id="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug *</label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Discription *</label>
                            <textarea name="short_discription" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Discription *</label>
                            <textarea name="discription" class="form-control editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
