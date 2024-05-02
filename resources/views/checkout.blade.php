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
            @if(auth()->check())
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
                                <input name="customer_name" id="name" type="text" class="form-control" placeholder="Enter Full Name" required>
                            </div>
                            <div class=" col-lg-6 col-12 mb-3">
                                <label class="mb-2 h6" for="Phone"> Enter Phone No</label>
                                <input name="customer_phone" id="Phone" type="number" class="form-control" placeholder="Enter Phone No" required>
                            </div>
                            <div class=" col-12 mb-3">
                                <label class="mb-2 h6" for="Address"> Enter Full Address</label>
                                <input name="customer_address" id="Address" type="text" class="form-control" placeholder="Enter Full Address" required>
                            </div>
                            <div class="col-12 mt-3">
                                <strong>Cash On Delivery 🚚</strong>


                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn  btn-success btn-lg w-100"> Submit</button>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card py-5 px-4" style="border: none;box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;">
                            <div class="text-center card-header">
                                <h3 class="text-secondary">Your Order</h3>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr class="">


                                        <th scope="col">Items</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartContent as $item )

                                    <tr>
                                        <td><img width="50" height="50" src="{{ url('storage/'.  $item->options[0]) }}" alt="not-show"></td>


                                        <td> {{$item->price}}</td>
                                        <td> {{$item->qty}}</td>
                                        <td> Rs {{$item->price * $item->qty}}</td>
                                    </tr>
                                    @endforeach
                                    @foreach ($cartContent as $item )

                                    <tr style="display: none;">
                                        <td>

                                            <label for="">id</label>
                                            <input readonly name="product_id[]" class="form-control" type="text" value="{{$item->id}}">
                                        </td>
                                        <td>

                                            <label for="">name</label>
                                            <input readonly name="" class="form-control" type="text" value="{{$item->name}}">
                                        </td>
                                        <td>
                                            <label for="">qty</label>
                                            <input readonly name="product_qty[]" class="form-control" type="text" value="{{$item->qty}}"></td>
                                        <td>
                                        <td>
                                            <label for="">product_price</label>
                                            <input readonly name="product_price[]" class="form-control" type="text" value="{{$item->price}}"></td>




                                    </tr>
                                    @endforeach


                                    <tr>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Rs {{Cart::subTotal() }}</th>
                                        <td><input hidden readonly name="sub_total" class="form-control" type="text" value="{{Cart::subTotal() }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Charges</td>
                                        <td>Rs :00.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Grand Total</th>
                                        <th scope="col">Rs {{Cart::subTotal() }}</th>
                                        <td><input hidden readonly name="grand_total" class="form-control" type="text" value="{{Cart::subTotal() }}"></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </form>
            @else
            <div class="row">
                <div class="col-12">
                    <div class="card-header py-4">
                        <h5>Please create an account to place an order.</h5>
                        <a href="{{ route('register') }}" class="btn  btn-success">SignUp</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    </div>
</section>

@endsection
