@extends('layouts.app')
@section('content')
<section style="margin: 60px 0px 0px 0px">
    <div class="container-xxl mt-5 py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <table class="table">
                        <thead>
                            <tr class="bg-info">

                                <th scope="col">Image</th>
                                <th scope="col">Items</th>
                                <th scope="col">Price</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!empty($cartContent))
                            @foreach ($cartContent as $item )
                          <tr>
                            <td><img src="{{ asset('storage/'. $item->image) }}" alt="not-show"></td>
                            <td>{{$item->name}}</td>
                            <td> ${{$item->price}}</td>
                            <td>
                                <input class="form-control" type="number" value="{{$item->qty}}">
                                {{-- {{$item->qty}} --}}
                            </td>
                            <td> ${{$item->price * $item->qty}}</td>
                          <td>  <button class="btn btn-danger">remove</button></td>
                          </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
                <div class="col-lg-5 col-12">
                    <div class="card py-5 px-4" style="border: none;box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;">
                        <div class="text-center card-header">
                            <h3 class="text-secondary">Cart Summery</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Subtotal</th>
                                    <th scope="col">${{Cart::subTotal()  }}</th>

                                </tr>
                                <tr>
                                    <th scope="col">Total</th>
                                    <th scope="col">${{Cart::subTotal()  }}</th>
                                </tr>
                            </thead>

                        </table>
                        <button class="btn btn-outline-primary"> Proceed to Checkout</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
</section>

@endsection
