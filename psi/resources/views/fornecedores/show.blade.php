@extends('layout')
	@section('header')
		<a href="/fornecedores">
                Fornecedores
        </a>
	@endsection
	@section('conteudo')

	ID:<b>{{$fornecedor->id_fornecedor}}</b><br>
	Nome:<b>{{$fornecedor->nome}}</b><br>

	<br>

	Produtos:
	@foreach ($fornecedor->produtos as $produto)
		<b>{{$produto->designacao}}</b>
	@endforeach

	<br><br>

	Categorias:
	@foreach ($fornecedor->categorias as $categoria)
		<b>{{$categoria->designacao}}</b>
	@endforeach
@endsection