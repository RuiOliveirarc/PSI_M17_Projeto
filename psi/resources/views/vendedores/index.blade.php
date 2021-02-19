@extends('layout')

<!-- Titulo da pagina -->
	@section('titulo-pagina')
			Projecto
	@endsection

<!-- Nome da pagina -->
	@section('header')
		<a href="/vendedores">
            Vendedores
        </a>
	@endsection

<!-- Texto -->
	@section('conteudo')
		<ul>
			@foreach($vendedores as $vendedor)
				<li>
					{{$vendedor->nome}}
					@if(auth()->check())
						<a href="{{route('vendedores.show',['id'=>$vendedor->id_vendedor])}}">
							<i class="fa fa-search"></i>
						</a>
						<a href="{{route('vendedores.edit',['id'=>$vendedor->id_vendedor])}}">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="{{route('vendedores.delete',['id'=>$vendedor->id_vendedor])}}">
							<i class="fa fa-trash"></i>
						</a>
					@endif
				</li>
			@endforeach
		</ul>
		{{$vendedores->render()}}
		@if(auth()->check())
			<h1><a href="{{route('vendedores.create',['id'=>$vendedor->id_vendedor])}}">
				+
			</a></h1>
		@endif
		

	@endsection