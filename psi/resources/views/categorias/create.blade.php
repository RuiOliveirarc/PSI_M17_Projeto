<form action="{{route('categorias.store')}}" enctype="multipart/form-data" method="post">

	@csrf

	Designação: <input type="text" name="designacao">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correto<br>
		@endif

	
	Icone: <input type="file" name="icone">
	<br>

		@if ($errors->has('icone'))
			Deverá indicar um icone correto<br>
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

