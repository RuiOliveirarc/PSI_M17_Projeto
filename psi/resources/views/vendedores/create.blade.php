<form action="{{route('vendedores.store')}}" method="post">

	@csrf

	Nome: <input type="text" name="nome">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto<br>
		@endif

	
	Especialidade: <input type="text" name="especialidade">
	<br>

		@if ($errors->has('especialidade'))
			Deverá indicar uma especialidade correta<br>
		@endif

	Email: <input type="text" name="email">
	<br>

		@if ($errors->has('email'))
			Deverá indicar um email correto<br>
		@endif

	Encomendas:
		<select name="id_encomenda[]" multiple="multiple">
			@foreach ($encomendas as $encomenda)
				<option value="{{$encomenda->id_encomenda}}">
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