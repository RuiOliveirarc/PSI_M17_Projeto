<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('titulo-pagina')</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
<div style="background-color: gray" class="container">
        <div class="row">
<!-- Logotipo -->
            <div class="col-md-2">
            	<img src="/img/logo.jpg">
			</div>

			<div style="" class="col-md-6">
            	<h1>Projeto PSI</h1>
				<h5>Rui Oliveira 12I-2</h5>
				<br>
				<a href="/">
					<h2>
						<i class="fa fa-home"></i>
					</h2>
				</a>
			</div>

			<div class="col-md-4"  style="text-align: right">
				<h2>
				<a href="/home">
					<i class="fa fa-power-off"></i>
				</a>
			</h2>
				<br>
				<br>

				<h1>
					@yield('header')
				</h1>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<h4>
		@yield('conteudo')
	</h4>
	<br>
	<button onclick="Back()">Go Back</button>
	<script>
		function Back() {
  			window.history.back();
		}
	</script>

	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>