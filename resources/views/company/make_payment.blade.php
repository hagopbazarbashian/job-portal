@extends('front.layout.app') @section('main_content') {{-- @section('seo_title'){{$pagefaqitem->title}}@endsection @section('meta_description'){{$pagefaqitem->meta_description}}@endsection --}}

<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}');">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Make Payment</h2>
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
                <div class="col-lg-9 col-md-12">
                    <h4>Current Plan</h4>
                    <div class="row box-items mb-4">
                        <div class="col-md-4">
                            <div class="box1">
                                @if ($currently_plan == null)
                                <span class="text-danger">No plan is available</span>
                                @else
                                <h4>${{$currently_plan->paid_amount}}</h4>
                                <p>{{ $currently_plan->rPricing->package_name}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h4>Choose plan and Make Payment</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <form action="{{route('company_payment')}}" method="post">
                                @csrf
                                <tr>
                                    <td class="w-200">
                                        <select name="package_id" class="form-control">
                                            @foreach ($packages as $package)
                                            <option value="{{$package->id}}">{{$package->package_name}} (${{$package->package_price}})</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Pay with PayPal</button>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="w-200">
                                        <select name="" class="form-control">
                                            @foreach ($packages as $package)
                                            <option value="{{$package->id}}">{{$package->package_name}} (${{$package->package_price}})</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary">Pay with stripe</a>
                                    </td>
                                </tr> --}}
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
