@extends('admin.layout.app')

@section('heading', 'Job Loction')

@section('button')
<div>
    <a href="{{ route('job-location.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add New</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Category Icon</th>
                                <th>Icon preview</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($jobcategorys as $key=>$jobcategory)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $jobcategory->name }}</td>
                                        <td>{{ $jobcategory->icon }}</td>
                                        <td>
                                            <i class="{{ $jobcategory->icon }}"></i>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_job_category_edit',$jobcategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{route('admin_job_category_delete' ,$jobcategory->id )}}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
