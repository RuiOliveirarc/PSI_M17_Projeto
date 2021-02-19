@extends('layout')

	@section('header')
		<a href="/produtos">
            Produtos
        </a>
	@endsection
	@section('conteudo')

		ID:<b>{{$produto->id_produto}}</b><br>
		Nome:<b>{{$produto->designacao}}</b><br>

<br>

		Fornecedores:
		@if(count($produto->fornecedores))
			@foreach($produto->fornecedores as $fornecedor)
				<b>{{$fornecedor->nome}}</b>
			@endforeach
		@endif

		<br><br>

		Encomendas:
		@if(count($produto->encomendas))
			@foreach($produto->encomendas as $encomenda)
				<b>{{$encomenda->designacao}}</b>
			@endforeach
		@endif

		<br><br>

		Categorias:
		@if(count($produto->categorias))
			@foreach($produto->categorias as $categoria)
				<b>{{$categoria->designacao}}</b>
			@endforeach
		@endif

	@endsection