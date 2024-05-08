  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  @include('flashy::message')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ url('assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ url('assets/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ url('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Template Javascript -->
  <script src="{{ url('assets/js/main.js') }}"></script>

  @stack('addToCartAjax')




