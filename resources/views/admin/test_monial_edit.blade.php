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
                    <form action="{{ route('admin_test_monials_update',$testmonials->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text" class="form-control" name="icon" value="{{ $whychooseitem->icon }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon preview *</label>
                            <div>
                                <i class="{{ $whychooseitem->icon }}"></i>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $whychooseitem->heading }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Text *</label>
                            <textarea name="text" class="form-control h_100" cols="30" rows="10">{!! $whychooseitem->text !!}</textarea>
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
