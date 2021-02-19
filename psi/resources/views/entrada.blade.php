@extends('layout')

<!-- Titulo da pagina -->
	@section('titulo-pagina')
			Projecto
	@endsection

<!-- Nome da pagina -->
	@section('header')
		Página inicial
	@endsection

<!-- Texto -->
	@section('conteudo')

        <h3>
            <a href="/produtos">
                Produtos
            </a>
        </h3>
    <br>
        <h3>
            <a href="/encomendas">
                Encomendas
            </a>
        </h3>
    <br>
        <h3>
            <a href="/categorias">
                Categorias
            </a>
        </h3>
    <br>
        <h3>
            <a href="/vendedores">
                Vendedores
            </a>
        </h3>
    <br>
        <h3>
            <a href="/fornecedores">
                Fornecedores
            </a>
        </h3>
    @endsection