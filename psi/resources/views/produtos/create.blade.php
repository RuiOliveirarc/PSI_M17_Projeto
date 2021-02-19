<form action="{{route('produtos.store')}}" method="post">

	@csrf

	Designação: <input type="text" name="designacao">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correta<br>
		@endif

	Stock: <input type="text" name="stock">
	<br>
		@if ($errors->has('stock'))
			Deverá indicar um stock correto<br>
		@endif

	Preço: <input type="text" name="preco">
	<br>

		@if ($errors->has('preco'))
			Deverá indicar um preço correto<br>
		@endif

		
	Categoria:
		<select name="id_categoria[]" multiple="multiple">
			@foreach ($categorias as $categoria)
				<option value="{{$categoria->id_categoria}}">{{$categoria->designacao}}</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_categoria'))
			Deverá indicar um id da categoria correto<br>
		@endif


	Fornecedores:
		<select name="id_fornecedor[]" multiple="multiple">
			@foreach ($fornecedores as $fornecedor)
				<option value="{{$fornecedor->id_fornecedor}}">{{$fornecedor->nome}}</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_fornecedor'))
			Deverá indicar um id do fornecedor correto<br>
		@endif

	Encomendas:
		<select name="id_encomenda[]" multiple="multiple">
			@foreach ($encomendas as $encomenda)
				<option value="{{$encomenda->id_encomenda}}">{{$encomenda->designacao}}</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_encomenda'))
			Deverá indicar um id da encomenda correto<br>
		@endif
	

	Observações: <textarea name="observacoes"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar uma observacao correta<br>
		@endif

	<input type="submit" name="enviar">
</form>
