
@extends('admin.layout.app')

@section('heading', 'Package')

@section('button')
<div>
    <a href="{{ route('admin_package_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add New</a>
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
                                <th>Package Name</th>
                                <th>Package Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($pricings as $key=>$pricing)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $pricing->package_name}}</td>
                                        <td>{{$pricing->package_price}}</td>

                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_package_edit',$pricing->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('admin_package_delete',$pricing->id ) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
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

