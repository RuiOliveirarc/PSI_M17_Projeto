<h2>deseja eliminar o fornecedor</h2>
<h2>{{$fornecedor->nome}}</h2>
<form method="post" action="{{route('fornecedores.destroy',['id'=>$fornecedor->id_fornecedor])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
	
</form>

@if(session()->has('mensagem'))
	<div class="alert alert-danger" role="alert">
		{{session('mensagem')}}
	</div>
@endif