<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Categoria;

class FornecedoresController extends Controller
{
    public function index(){
    	$fornecedores = Fornecedor::paginate(10);

    	return view ('fornecedores.index', [
    		'fornecedores'=>$fornecedores
    	]);
    }


    public function show (Request $request){

    	$idFornecedor=$request->id;


        $fornecedor=Fornecedor::where('id_fornecedor', $idFornecedor)->with(['produtos','categorias'])->first();

    	return view('fornecedores.show', [
    			'fornecedor'=>$fornecedor
    	]);
    }


    public function create(){
        $categorias=Categoria::all();
        $produtos=Produto::all();

        return view('fornecedores.create',[
            'categorias'=>$categorias,
            'produtos'=>$produtos
        ]);
    }


    public function store(Request $request) {
        $novoFornecedor = $request->validate([
            'nome'=>['required','min:3','max:50'],
            'morada'=>['nullable','min:3','max:100'],
            'telefone'=>['nullable','numeric'],
            'observacoes'=>['nullable','min:3','max:255'],
        ]);

        $categorias = $request->id_categoria;
        $produtos = $request->id_produto;

        $fornecedor = Fornecedor::create($novoFornecedor);

        $fornecedor->categorias()->attach($categorias);
        $fornecedor->produtos()->attach($produtos);

        return redirect()->route('fornecedores.show',[
            'id'=>$fornecedor->id_fornecedor
        ]);
    }



    public function edit (Request $request) {
        $idFornecedor = $request->id;

        $categorias = Categoria::all();
        $produtos=Produto::all();

        $fornecedor = Fornecedor::where('id_fornecedor', $idFornecedor)->with(['produtos','categorias'])->first();

        $categoriasFornecedor = [];
        $produtosFornecedor = [];

        foreach ($fornecedor->categorias as $categoria) {
            $categoriasFornecedor[] = $categoria->id_categoria;
        }
        foreach ($fornecedor->produtos as $produto) {
            $produtosFornecedor[] = $produto->id_produto;
        }

        return view('fornecedores.edit',[
            'fornecedor'=>$fornecedor,
            'categorias'=>$categorias,
            'categoriasFornecedor'=>$categoriasFornecedor,
            'produtos'=>$produtos,
            'produtosFornecedor'=>$produtosFornecedor
        ]);
    }

    public function update (Request $request){
        $idFornecedor = $request->id;
        $fornecedor = Fornecedor::findOrFail($idFornecedor);

        $atualizarFornecedor=$request->validate([
            'nome'=>['required','min:3','max:50'],
            'morada'=>['nullable','min:3','max:100'],
            'telefone'=>['nullable','numeric'],
            'observacoes'=>['nullable','min:3','max:255'],
        ]);

        $categorias=$request->id_categoria;
        $produtos=$request->id_produto;

        $fornecedor->update($atualizarFornecedor);

        $fornecedor->categorias()->sync($categorias);
        $fornecedor->produtos()->sync($produtos);

        return redirect()->route('fornecedores.show',[
            'id'=>$fornecedor->id_fornecedor
        ]);
    }
    public function delete (Request $request) {
        $idFornecedor=$request->id;
        $fornecedor = Fornecedor::where('id_fornecedor', $idFornecedor)->first();
        return view('fornecedores.delete',[
            'fornecedor'=>$fornecedor
        ]);
    }

    public function destroy (Request $request) {
        $idFornecedor = $request->id;

        $fornecedor = Fornecedor::findOrFail($idFornecedor);
        $categoriasFornecedor = Fornecedor::findOrFail($idFornecedor)->categorias;
        $produtosFornecedor = Fornecedor::findOrFail($idFornecedor)->produtos;

        $fornecedor->categorias()->detach($categoriasFornecedor);
        $fornecedor->produtos()->detach($produtosFornecedor);

        $fornecedor->delete();

        return redirect()->route('fornecedores.index')->with('mensagem','Fornecedor eliminado!');
    }
}
