@extends('front.layout.app') @section('main_content') {{-- @section('seo_title'){{$pagefaqitem->title}}@endsection @section('meta_description'){{$pagefaqitem->meta_description}}@endsection --}}

<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}');">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Orders</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                   @include('company.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Payment Id</th>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>Expire Date</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                            @if ($orders->count())
                            @foreach ($orders as $key=>$order)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$order->order_no}}</td>
                                <td>{{$order->rPricing->package_name}}</td>
                                <td>${{$order->paid_amount}}</td>
                                <td>{{$order->start_date}}</td>
                                <td>{{$order->expire_date}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
