@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('button')
<div>
    <a href="{{ route('admin_job_category') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Show All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_test_monials_update',$testmonials->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing photo</label>
                            <div>
                                <img src="{{asset('uploads/'.$testmonials->photo)}}" alt="" class="w_150">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $testmonials->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>designation *</label>
                            <input type="text" class="form-control" name="designation" value="{{ $testmonials->designation }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Comment *</label>
                            <textarea name="comment" class="form-control h_100" cols="30" rows="10">{!! $testmonials->comment !!}</textarea>
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
