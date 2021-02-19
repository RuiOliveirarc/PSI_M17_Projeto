<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Encomenda;


class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::paginate(10);

        return view ('produtos.index', [
            'produtos'=>$produtos
        ]);
    }

    public function show (Request $request){

        $idProduto=$request->id;

        $produto= Produto::where('id_produto',$idProduto)->with(['fornecedores','encomendas','categorias'])->first();
        
        return view('produtos.show', [
                'produto'=>$produto
        ]);
    }

    public function create(){
        $categorias=Categoria::all();
        $encomendas=Encomenda::all();
        $fornecedores=Fornecedor::all();
        return view ('produtos.create',[
            'categorias'=>$categorias,
            'fornecedores'=>$fornecedores,
            'encomendas'=>$encomendas
        ]);
    }

    public function store (Request $request) {
        $novoProduto=$request->validate([
            'designacao'=>['required','min:3','max:100'],
            'stock'=>['nullable','numeric','min:1'],
            'preco'=>['required','numeric','min:1'],
            'observacoes'=>['nullable','min:3','max:255'],
        ]);
        $categorias = $request->id_categoria;
        $fornecedores = $request->id_fornecedor;
        $encomendas = $request->id_encomenda;

        $produto=Produto::create($novoProduto);

        $produto->categorias()->attach($categorias);
        $produto->fornecedores()->attach($fornecedores);
        $produto->encomendas()->attach($encomendas);

        return redirect()->route('produtos.show',[
            'id'=>$produto->id_produto
        ]);
    }

    public function edit (Request $request) {
        $idProduto = $request->id;

        $categorias = Categoria::all();
        $fornecedores = Fornecedor::all();
        $encomendas = Encomenda::all();

        $produto = Produto::where('id_Produto', $idProduto)->with(['categorias','fornecedores','encomendas'])->first();

        $categoriasProduto = [];
        $fornecedoresProduto = [];
        $encomendasProduto = [];

        foreach ($produto->categorias as $categoria) {
            $categoriasProduto[] = $categoria->id_categoria;
        }
        foreach ($produto->fornecedores as $fornecedor) {
            $fornecedoresProduto[] = $fornecedor->id_fornecedor;
        }
        foreach ($produto->encomendas as $encomenda) {
            $encomendasProduto[] = $encomenda->id_encomenda;
        }

        return view('produtos.edit',[
            'produto'=>$produto,
            'categorias'=>$categorias,
            'categoriasProduto'=>$categoriasProduto,
            'fornecedores'=>$fornecedores,
            'fornecedoresProduto'=>$fornecedoresProduto,
            'encomendas'=>$encomendas,
            'encomendasProduto'=>$encomendasProduto
        ]);
    }

    public function update (Request $request){
        $idProduto = $request->id;
        $produto = Produto::findOrFail($idProduto);

        $atualizarProduto=$request->validate([
            'designacao'=>['required','min:3','max:100'],
            'stock'=>['nullable','numeric','min:1'],
            'preco'=>['required','numeric','min:1'],
            'observacoes'=>['nullable','min:3','max:255'],
        ]);

        $categorias=$request->id_categoria;
        $fornecedores=$request->id_fornecedor;
        $encomendas=$request->id_encomenda;

        $produto->update($atualizarProduto);

        $produto->categorias()->sync($categorias);
        $produto->fornecedores()->sync($fornecedores);
        $produto->encomendas()->sync($encomendas);

        return redirect()->route('produtos.show',[
            'id'=>$produto->id_produto
        ]);
    }
    public function delete (Request $request) {
        $idProduto=$request->id;
        $produto = Produto::where('id_produto', $idProduto)->first();
        return view('produtos.delete',[
            'produto'=>$produto
        ]);
    }

    public function destroy (Request $request) {
        $idProduto = $request->id;

        $produto = Produto::findOrFail($idProduto);
        $categoriasProduto = Produto::findOrFail($idProduto)->categorias;
        $fornecedoresProduto = Produto::findOrFail($idProduto)->fornecedores;
        $encomendasProduto = Produto::findOrFail($idProduto)->encomendas;

        $produto->categorias()->detach($categoriasProduto);
        $produto->fornecedores()->detach($fornecedoresProduto);
        $produto->encomendas()->detach($encomendasProduto);
        
        $produto->delete();

        return redirect()->route('produtos.index')->with('mensagem','Produto eliminado!');
    }
}
