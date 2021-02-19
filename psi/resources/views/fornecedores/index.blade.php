@extends('layout')

<!-- Titulo da pagina -->
	@section('titulo-pagina')
			Projecto
	@endsection

<!-- Nome da pagina -->
	@section('header')
		<a href="/fornecedores">
                Fornecedores
        </a>
	@endsection

<!-- Texto -->
	@section('conteudo')
	<ul>
		@foreach($fornecedores as $fornecedor)
			<li>
				{{$fornecedor->nome}}
				@if(auth()->check())
				<a href="{{route('fornecedores.show',['id'=>$fornecedor->id_fornecedor])}}">
					<i class="fa fa-search"></i>
				</a>
				<a href="{{route('fornecedores.edit',['id'=>$fornecedor->id_fornecedor])}}">
					<i class="fa fa-pencil"></i>
				</a>
				<a href="{{route('fornecedores.delete',['id'=>$fornecedor->id_fornecedor])}}">
					<i class="fa fa-trash"></i>
				</a>
				@endif
			</li>
		@endforeach
	</ul>
	{{$fornecedores->render()}}
	@if(auth()->check())
	<h1><a href="{{route('fornecedores.create',['id'=>$fornecedor->id_fornecedor])}}">
		+
	</a></h1>
	@endif

@endsection