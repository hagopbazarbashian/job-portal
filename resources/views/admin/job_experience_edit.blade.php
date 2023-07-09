@extends('admin.layout.app')

@section('heading', 'Edit Job Experience')

@section('button')
<div>
    <a href="{{ route('job-experience.index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Show All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('job-experience.update',$jobexperience->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $jobexperience->name }}">
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
