<form action="{{route('vendedores.update',['id'=>$vendedor->id_vendedor])}}" method="post">

	@csrf
	@method('patch')

	Nome: <input type="text" name="nome" value="{{$vendedor->nome}}">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto<br>
		@endif

	
	Especialidade: <input type="text" name="especialidade" value="{{$vendedor->especialidade}}">
	<br>

		@if ($errors->has('especialidade'))
			Deverá indicar uma especialidade correta<br>
		@endif

	Email: <input type="text" name="email" value="{{$vendedor->email}}">
	<br>

		@if ($errors->has('email'))
			Deverá indicar um email correto<br>
		@endif

	Encomenda:
		<select name="id_encomenda[]" multiple="multiple">
			@foreach ($encomendas as $encomenda)
				<option value="{{$encomenda->id_encomenda}}"
					@if(in_array($encomenda->
					id_encomenda, $encomendasVendedor))selected
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

	<input type="submit" name="enviar">
</form>