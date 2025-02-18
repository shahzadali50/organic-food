@extends('layouts.app')
@section('content')
 <!-- Page Header Start -->
 <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Testimonial</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Testimonial Start -->
<x-client-message/>
<!-- Testimonial End -->

@endsection
