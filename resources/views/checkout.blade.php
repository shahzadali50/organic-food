@extends('layouts.app')
<style>
    .form-control:focus {
        box-shadow: none !important;
        border: 2px solid #3b3b3a !important;

    }

</style>
@section('content')
<section style="margin: 40px 0px;">
    <div class="container-xxl mt-5 py-6">
        <div class="container">
            <form action="{{ route('order.generate') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-header mb-4 border">
                                    <h5>
                                        Delivery
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 mb-3">
                                <label class="mb-2 h6" for="name">Enter Full Name</label>
                                <input name="customer_name" id="name" type="text" class="form-control" placeholder="Enter Full Name">
                            </div>
                            <div class=" col-lg-6 col-12 mb-3">
                                <label class="mb-2 h6" for="Phone"> Enter Phone No</label>
                                <input  name="customer_phone" id="Phone" type="number" class="form-control" placeholder="Enter Phone No">
                            </div>
                            <div class=" col-12 mb-3">
                                <label class="mb-2 h6" for="Address"> Enter Full Address</label>
                                <input  name="customer_address" id="Address" type="text" class="form-control" placeholder="Enter Full Address">
                            </div>
                            <div class="col-12">
                                <button class="btn  btn-success btn-lg w-100"> Submit</button>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card py-5 px-4" style="border: none;box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;">
                            <div class="text-center card-header">
                                <h3 class="text-secondary">Your Order</h3>
                            </div>
                            <table class="table">
                                <thead>
                                    @foreach ($cartContent as $item )

                                    <tr>
                                        <td><img width="50" height="50" src="{{ url('storage/'.  $item->options[0]) }}" alt="not-show"></td>
                                        <td>{{$item->name}}</td>
                                        <td> {{$item->qty}}</td>
                                        <td> Rs {{$item->price * $item->qty}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach ($cartContent as $item )

                                    <tr>
                                        <td>
                                            <label for="">name</label>
                                            <input readonly name="" class="form-control" type="text" value="{{$item->name}}">
                                        </td>
                                        <td>
                                            <label for="">qty</label>
                                            <input readonly name="product_qty" class="form-control" type="text" value="{{$item->qty}}"></td>
                                        <td>
                                            <label for="">sub Total</label>
                                            <input readonly name="sub_total" class="form-control" type="text" value="{{$item->price * $item->qty}}"></td>
                                        <td>
                                            <label for="">Grand Total</label>
                                            <input readonly name="grand_total" class="form-control" type="text" value="{{$item->price * $item->qty}}"></td>



                                    </tr>
                                    @endforeach

                                    <tr>
                                        <th scope="col">Grand Total</th>
                                        <th scope="col">Rs {{Cart::subTotal() }}</th>
                                        <td><input readonly name="" class="form-control" type="text" value="{{Cart::subTotal() }}"></td>
                                    </tr>
                                </thead>

                            </table>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>

    </div>
</section>

@endsection
