<form action="{{route('fornecedores.update',['id'=>$fornecedor->id_fornecedor])}}" method="post">

	@csrf
	@method('patch')

	Nome: <input type="text" name="nome" value="{{$fornecedor->nome}}">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto<br>
		@endif

	Morada: <input type="text" name="morada" value="{{$fornecedor->morada}}">
	<br>
		@if ($errors->has('morada'))
			Deverá indicar uma morada correta<br>
		@endif

	Telefone: <input type="text" name="telefone" value="{{$fornecedor->telefone}}">
	<br>

		@if ($errors->has('telefone'))
			Deverá indicar um telefone correto<br>
		@endif

		

	Observações: <textarea name="observacoes">{{$fornecedor->observacoes}}</textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar uma observacao correta<br>
		@endif

	Categoria:
		<select name="id_categoria[]" multiple="multiple">
			@foreach ($categorias as $categoria)
				<option value="{{$categoria->id_categoria}}"
					@if(in_array($categoria->
					id_categoria, $categoriasFornecedor))selected
					@endif
					>
					{{$categoria->designacao}}
				</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_categoria'))
			Deverá indicar um id da categoria correto<br>
		@endif

	Produto:
		<select name="id_produto[]" multiple="multiple">
			@foreach ($produtos as $produto)
				<option value="{{$produto->id_produto}}"
					@if(in_array($produto->
					id_produto, $produtosFornecedor))selected
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