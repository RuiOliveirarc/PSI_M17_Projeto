<form action="{{route('produtos.update',['id'=>$produto->id_produto])}}" method="post">

	@csrf
	@method('patch')

	Designação: <input type="text" name="designacao" value="{{$produto->designacao}}">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correta<br>
		@endif

	Stock: <input type="text" name="stock" value="{{$produto->stock}}">
	<br>
		@if ($errors->has('stock'))
			Deverá indicar um stock correto<br>
		@endif

	Preço: <input type="text" name="preco" value="{{$produto->preco}}">
	<br>

		@if ($errors->has('preco'))
			Deverá indicar um preço correto<br>
		@endif

		
	Categoria:
		<select name="id_categoria[]" multiple="multiple">
			@foreach ($categorias as $categoria)
				<option value="{{$categoria->id_categoria}}"
					@if(in_array($categoria->
					id_categoria, $categoriasProduto))selected
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

	Fornecedor:
		<select name="id_fornecedor[]" multiple="multiple">
			@foreach ($fornecedores as $fornecedor)
				<option value="{{$fornecedor->id_fornecedor}}"
					@if(in_array($fornecedor->
					id_fornecedor, $fornecedoresProduto))selected
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

	Encomendas:
		<select name="id_encomenda[]" multiple="multiple">
			@foreach ($encomendas as $encomenda)
				<option value="{{$encomenda->id_encomenda}}"
					@if(in_array($encomenda->
					id_encomenda, $encomendasProduto))selected
					@endif
					>
					{{$encomenda->designacao}}
				</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_encomenda'))
			Deverá indicar um id da encomenda correta<br>
		@endif


	Observações: <textarea name="observacoes" value="{{$produto->observacao}}"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar uma observacao correta<br>
		@endif

	<input type="submit" name="enviar">
</form>
