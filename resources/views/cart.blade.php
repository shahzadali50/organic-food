@extends('layouts.app')
@section('content')
    <section style="margin: 60px 0px 0px 0px">
        <div class="container-xxl mt-5 py-6">
            <div class="container">
                <div class="row">
                    @if (Session::has('success'))
                        <div class="col-lg-7 col-12 ">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="col-lg-7 col-12 ">
                            <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>

                        </div>
                    @endif

                    @if (Cart::count() > 0)
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

                                    @foreach ($cartContent as $item)
                                        <tr>
                                            <td><img width="80" height="80"
                                                    src="{{ url('storage/' . $item->options[0]) }}" alt="not-show"></td>
                                            <td>{{ $item->name }}</td>
                                            <td> Rs {{ $item->price }}/-</td>
                                            <td class="d-flex" style="width: 180px">
                                                <div>
                                                    <button style="height: 35px;" class="btn btn-success sub"
                                                        data-id="{{ $item->rowId }}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>

                                                </div>
                                                <input readonly style="height: 35px;" class="form-control" type="number"
                                                    value="{{ $item->qty }}">
                                                <div>

                                                    <button class="btn btn-success add" style="height: 35px;"
                                                        data-id="{{ $item->rowId }}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>

                                                </div>
                                            </td>
                                            <td> Rs {{ $item->price * $item->qty }}/-</td>
                                            <td>
                                                <button onclick="deleteItem('{{ $item->rowId }}')"
                                                    class="btn btn-danger"><i class="fa fa-times"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <a href="{{ route('home') }}" class="btn  btn-success"> <i
                                    class="fa fa-shopping-cart text-white" aria-hidden="true"></i> Continue shopping</a>


                        </div>
                        <div class="col-lg-5 col-12">
                            <div class="card py-5 px-4"
                                style="border: none;box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;">
                                <div class="text-center card-header">
                                    <h3 class="text-secondary">Cart Summery</h3>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Rs {{ Cart::subTotal() }}/-</th>

                                        </tr>
                                        <tr>
                                            <th scope="col">Total</th>
                                            <th scope="col">Rs {{ Cart::subTotal() }}/-</th>
                                        </tr>
                                    </thead>

                                </table>
                                <a href="{{ route('checkout') }}" class="btn  btn-success"><i class="fa fa-lock"
                                        aria-hidden="true"></i> Proceed to Checkout</a>
                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="card ">
                                <div class="card-header py-4">
                                    <h5>Your cart is Empty !</h5>
                                    <a href="{{ route('home') }}" class="btn  btn-success"> <i
                                            class="fa fa-shopping-cart text-white" aria-hidden="true"></i> Continue
                                        shopping</a>

                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        </div>
    </section>

@endsection
@push('addToCartAjax')
    <script>
        $('.add').click(function() {
            var qtyElement = $(this).parent().prev(); // Qty Input
            var qtyValue = parseInt(qtyElement.val());
            // if (qtyValue < 10) {
            qtyElement.val(qtyValue + 1);
            var rowId = $(this).data('id');
            var newQty = qtyElement.val()
            updateCart(rowId, newQty)
            // }
        });
        $('.sub').click(function() {
            var qtyElement = $(this).parent().next();
            var qtyValue = parseInt(qtyElement.val());
            // if (qtyValue > 1) {
            qtyElement.val(qtyValue - 1);
            var rowId = $(this).data('id');
            var newQty = qtyElement.val()
            updateCart(rowId, newQty)
            // }
        });

        function updateCart(rowId, qty) {
            var csrfToken = "{{ csrf_token() }}";
            $.ajax({
                url: '{{ route('front.updateCart') }}',
                type: 'post',
                data: {
                    rowId: rowId,
                    qty: qty,
                    _token: csrfToken,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('cart') }}";
                    } else {

                        Swal.fire({
                            icon: "error",
                            title: "Not Available Stock",
                            text: "Something went wrong!",
                            footer: response.message,
                            didClose: function() {
                        location.reload(); // Reload the page after the modal is closed
                    }
                        });
                        // alert(response.message);
                    }
                }
            })
        }

        function deleteItem(rowId) {
            var csrfToken = "{{ csrf_token() }}";
            if (confirm('Are you sure you want to delete')) {
                $.ajax({
                    url: '{{ route('front.deleteItem.cart') }}',
                    type: 'post',
                    data: {
                        rowId: rowId,
                        _token: csrfToken,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('cart') }}";
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }
    </script>
@endpush
