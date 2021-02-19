<form action="{{route('fornecedores.store')}}" method="post">

	@csrf

	Nome: <input type="text" name="nome">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto<br>
		@endif

	Morada: <input type="text" name="morada">
	<br>
		@if ($errors->has('morada'))
			Deverá indicar uma morada correta<br>
		@endif

	Telefone: <input type="text" name="telefone">
	<br>

		@if ($errors->has('telefone'))
			Deverá indicar um telefone correto<br>
		@endif

		

	Observações: <textarea name="observacoes"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar uma observacao correta<br>
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

	Produtos:
		<select name="id_produto[]" multiple="multiple">
			@foreach ($produtos as $produto)
				<option value="{{$produto->id_produto}}">{{$produto->designacao}}</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_produto'))
			Deverá indicar um id do produto correto<br>
		@endif


	<input type="submit" name="enviar">
</form>

