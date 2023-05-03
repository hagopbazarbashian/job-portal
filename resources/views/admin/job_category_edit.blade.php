@extends('admin.layout.app')

@section('heading', 'Edit Job Category')

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
                    <form action="{{ route('admin_job_category_update',$jobCategory->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Category Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $jobCategory->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon preview *</label>
                            <div>
                                <i class="{{ $jobCategory->icon }}"></i>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Icon *</label>
                            <input type="text" class="form-control" name="icon" value="{{ $jobCategory->icon }}">
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
