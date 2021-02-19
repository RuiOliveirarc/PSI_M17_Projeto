@extends('layout')
	@section('header')
		<a href="/categorias">
                Categorias
        </a>
	@endsection
	@section('conteudo')

	ID:<b>{{$categoria->id_categoria}}</b><br>
	Nome:<b>{{$categoria->designacao}}</b><br>
	@if(isset($categoria->icone))
	<img src="{{asset('public/img/'.$categoria->icone)}}">
	@endif
	<br>


	Fornecedores:
	@foreach ($categoria->fornecedores as $fornecedor)
		<b>{{$fornecedor->nome}}</b>
	@endforeach

	<br><br>
	
	Produtos:
	@foreach ($categoria->produtos as $produto)
		<b>{{$produto->designacao}}</b>
	@endforeach
@endsection