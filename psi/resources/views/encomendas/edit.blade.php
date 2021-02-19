<form action="{{route('encomendas.update',['id'=>$encomenda->id_encomenda])}}" method="post">

	@csrf
	@method('patch')

	Designação: <input type="text" name="designacao" value="{{$encomenda->designacao}}">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correta<br>
		@endif

	Observações: <textarea name="observacoes">{{$encomenda->observacoes}}</textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar uma observacao correta<br>
		@endif

	Produto:
		<select name="id_produto[]" multiple="multiple">
			@foreach ($produtos as $produto)
				<option value="{{$produto->id_produto}}"
					@if(in_array($produto->
					id_produto, $produtosEncomenda))selected
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

	Vendedor:
		<select name="id_vendedor[]" multiple="multiple">
			@foreach ($vendedores as $vendedor)
				<option value="{{$vendedor->id_vendedor}}"
					@if(in_array($vendedor->
					id_vendedor, $vendedoresEncomenda))selected
					@endif
					>
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
