<h2>deseja eliminar o produto</h2>
<h2>{{$produto->designacao}}</h2>
<form method="post" action="{{route('produtos.destroy',['id'=>$produto->id_produto])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
	
</form>

@if(session()->has('mensagem'))
	<div class="alert alert-danger" role="alert">
		{{session('mensagem')}}
	</div>
@endif