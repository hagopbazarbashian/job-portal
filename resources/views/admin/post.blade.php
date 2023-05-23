@extends('admin.layout.app')

@section('heading', 'Post')

@section('button')
<div>
    <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add New</a>
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
                                <th>Photo</th>
                                <th>Heading</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key=>$jobcategory)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{asset('uploads/'. $jobcategory->photo)}}" alt="" class="w_150">
                                        </td>
                                        <td>{{ $jobcategory->heading}}</td>

                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_post_edit',$jobcategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('admin_post_delete',$jobcategory->id ) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
