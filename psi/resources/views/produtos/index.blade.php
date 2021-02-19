@extends('layout')

<!-- Titulo da pagina -->
	@section('titulo-pagina')
			Projecto
	@endsection

<!-- Nome da pagina -->
	@section('header')
		<a href="/produtos">
            Produtos
        </a>
	@endsection

<!-- Texto -->
	@section('conteudo')
		 <ul>
			@foreach($produtos as $produto)
				<li>
					{{$produto->designacao}}
					@if(auth()->check())
					<a href="{{route('produtos.show',['id'=>$produto->id_produto])}}">
						<i class="fa fa-search"></i>
					</a>
					<a href="{{route('produtos.edit',['id'=>$produto->id_produto])}}">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="{{route('produtos.delete',['id'=>$produto->id_produto])}}">
						<i class="fa fa-trash"></i>
					</a>
					@endif
				</li>
			@endforeach
		</ul>
	{{$produtos->render()}}
	@if(auth()->check())
	<h1><a href="{{route('produtos.create',['id'=>$produto->id_produto])}}">
		+
	</a></h1>
	@endif

	@endsection