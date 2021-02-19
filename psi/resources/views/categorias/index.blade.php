@extends('layout')

<!-- Titulo da pagina -->
	@section('titulo-pagina')
			Projecto
	@endsection

<!-- Nome da pagina -->
	@section('header')
		<a href="/categorias">
                Categorias
        </a>
	@endsection

<!-- Texto -->
	@section('conteudo')
		<ul>
			@foreach($categorias as $categoria)
				<li>
					{{$categoria->designacao}}
					@if(auth()->check())
						<a href="{{route('categorias.show',['id'=>$categoria->id_categoria])}}">
							<i class="fa fa-search"></i>
						</a>
						<a href="{{route('categorias.edit',['id'=>$categoria->id_categoria])}}">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="{{route('categorias.delete',['id'=>$categoria->id_categoria])}}">
							<i class="fa fa-trash"></i>
						</a>
					@endif
				</li>
			@endforeach
		</ul>
		{{$categorias->render()}}
		@if(auth()->check())
			<h1><a href="{{route('categorias.create',['id'=>$categoria->id_categoria])}}">
				+
			</a></h1>
		@endif

	@endsection