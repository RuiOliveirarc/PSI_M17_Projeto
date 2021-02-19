@extends('layout')

<!-- Titulo da pagina -->
	@section('titulo-pagina')
			Projecto
	@endsection

<!-- Nome da pagina -->
	@section('header')
		<a href="/encomendas">
                Encomendas
        </a>
	@endsection

<!-- Texto -->
	@section('conteudo')
	<ul>
		@foreach($encomendas as $encomenda)
			<li>
				{{$encomenda->designacao}}
				@if(auth()->check())
				<a href="{{route('encomendas.show',['id'=>$encomenda->id_encomenda])}}">
					<i class="fa fa-search"></i>
				</a>
				<a href="{{route('encomendas.edit',['id'=>$encomenda->id_encomenda])}}">
					<i class="fa fa-pencil"></i>
				</a>
				<a href="{{route('encomendas.delete',['id'=>$encomenda->id_encomenda])}}">
					<i class="fa fa-trash"></i>
				</a>
				@endif
			</li>
		@endforeach
	</ul>
	{{$encomendas->render()}}
	@if(auth()->check())
	<h1><a href="{{route('encomendas.create',['id'=>$encomenda->id_encomenda])}}">
		+
	</a></h1>
	@endif
@endsection