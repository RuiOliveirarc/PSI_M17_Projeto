@extends('layout')
	@section('header')
		<a href="/vendedores">
            Vendedores
        </a>
	@endsection
	@section('conteudo')
		ID:<b>{{$vendedor->id_vendedor}}</b><br><br>
		Nome:<b>{{$vendedor->nome}}</b><br><br>
		Encomendas:
		@foreach ($vendedor->encomendas as $encomenda)
			<b>{{$encomenda->designacao}}</b>
		@endforeach
	@endsection