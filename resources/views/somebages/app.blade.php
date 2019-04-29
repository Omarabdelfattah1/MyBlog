<!DOCTYPE html>
<html>
<head>
	<title>acme</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
	@include('inc.navbar')

	<div class="container">
		@include('inc.messages')
		@if(Request::is('/'))
			@include('inc.showcase')
			
		@endif	
		<div class="row">
			<div class="col-md-8 col-lg-8">
				@yield('content')
			</div>
			<div class="col-md-4 col-lg-4">
				@include('inc.sidebar')
			</div>
		</div>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
	<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small footer ">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
	
	

</body>
</html>