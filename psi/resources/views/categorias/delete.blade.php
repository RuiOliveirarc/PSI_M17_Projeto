<h2>deseja eliminar a categoria</h2>
<h2>{{$categoria->designacao}}</h2>
<form method="post" action="{{route('categorias.destroy',['id'=>$categoria->id_categoria])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
	
</form>

@if(session()->has('mensagem'))
	<div class="alert alert-danger" role="alert">
		{{session('mensagem')}}
	</div>
@endif