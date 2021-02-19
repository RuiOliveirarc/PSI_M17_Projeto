<h2>deseja eliminar a encomenda</h2>
<h2>{{$encomenda->designacao}}</h2>
<form method="post" action="{{route('encomendas.destroy',['id'=>$encomenda->id_encomenda])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
	
</form>

@if(session()->has('mensagem'))
	<div class="alert alert-danger" role="alert">
		{{session('mensagem')}}
	</div>
@endif