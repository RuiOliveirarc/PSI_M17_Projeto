<form action="{{route('categorias.update',['id'=>$categoria->id_categoria])}}" enctype="multipart/form-data" method="post">

	@csrf
	@method('patch')

	Designação: <input type="text" name="designacao" value="{{$categoria->designacao}}">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correto<br>
		@endif

	
	Icone: <input type="file" name="icone">
	<br>

		@if ($errors->has('icone'))
			Deverá indicar um icone correto<br>
		@endif

	Fornecedor:
		<select name="id_fornecedor[]" multiple="multiple">
			@foreach ($fornecedores as $fornecedor)
				<option value="{{$fornecedor->id_fornecedor}}"
					@if(in_array($fornecedor->
					id_fornecedor, $fornecedoresCategoria))selected
					@endif
					>
					{{$fornecedor->nome}}
				</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_fornecedor'))
			Deverá indicar um id do fornecedor correto<br>
		@endif


	Produto:
		<select name="id_produto[]" multiple="multiple">
			@foreach ($produtos as $produto)
				<option value="{{$produto->id_produto}}"
					@if(in_array($produto->
					id_produto, $produtosCategoria))selected
					@endif
					>
					{{$produto->designacao}}
				</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_produto'))
			Deverá indicar um id do fornecedor correto<br>
		@endif

	<input type="submit" name="enviar">
</form>