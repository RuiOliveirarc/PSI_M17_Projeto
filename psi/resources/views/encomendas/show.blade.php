@extends('layout')
	@section('header')
		<a href="/encomendas">
                Encomendas
        </a>
	@endsection
	@section('conteudo')

	ID:<b>{{$encomenda->id_encomenda}}</b><br>
	Nome:<b>{{$encomenda->designacao}}</b><br>

<br>
	Produtos:
	@foreach ($encomenda->produtos as $produto)
		<b>{{$produto->designacao}}</b>
	@endforeach
<br>
<br>
	Vendedores:
	@foreach ($encomenda->vendedores as $vendedor)
		<b>{{$vendedor->nome}}</b>
	@endforeach
@endsection