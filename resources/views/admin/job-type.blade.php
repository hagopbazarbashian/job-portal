@extends('admin.layout.app')

@section('heading', 'Job Type')

@section('button')
<div>
    <a href="{{route('job-type.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Add New</a>
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobtypes as $key=>$jobtype)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $jobtype->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{route('job-type.edit',$jobtype->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <form method="POST" action="{{ route('job-type.destroy', $jobtype->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button  class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</button>
                                            </form>
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