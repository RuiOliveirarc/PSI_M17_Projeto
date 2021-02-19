<h2>deseja eliminar a vendedor</h2>
<h2>{{$vendedor->nome}}</h2>
<form method="post" action="{{route('vendedores.destroy',['id'=>$vendedor->id_vendedor])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
	
</form>

@if(session()->has('mensagem'))
	<div class="alert alert-danger" role="alert">
		{{session('mensagem')}}
	</div>
@endif