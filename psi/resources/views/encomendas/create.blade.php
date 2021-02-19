<form action="{{route('encomendas.store')}}" method="post">

	@csrf

	Designação: <input type="text" name="designacao">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correta<br>
		@endif

	
	Observações: <textarea name="observacoes"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar uma observacao correta<br>
		@endif

	Produtos:
		<select name="id_produto[]" multiple="multiple">
			@foreach ($produtos as $produto)
				<option value="{{$produto->id_produto}}">
					{{$produto->designacao}}
				</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_produto'))
			Deverá indicar um id do produto correto<br>
		@endif

	Vendedores:
		<select name="id_vendedor[]" multiple="multiple">
			@foreach ($vendedores as $vendedor)
				<option value="{{$vendedor->id_vendedor}}">
					{{$vendedor->nome}}
				</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_vendedor'))
			Deverá indicar um id do vendedor correto<br>
		@endif

	<input type="submit" name="enviar">
</form>
