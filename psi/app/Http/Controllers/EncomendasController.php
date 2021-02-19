<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\Vendedor;
use App\Models\Produto;

class EncomendasController extends Controller
{
    public function index(){
    	$encomendas = Encomenda::paginate(10);

    	return view ('encomendas.index', [
    		'encomendas'=>$encomendas
    	]);
    }


    public function show (Request $request){

    	$idEncomenda=$request->id;


        $encomenda=Encomenda::where('id_encomenda', $idEncomenda)->with(['produtos','vendedores'])->first();

    	return view('encomendas.show', [
    			'encomenda'=>$encomenda
    	]);
    }

    public function create(){
        $produtos=Produto::all();
        $vendedores=Vendedor::all();
        return view('encomendas.create',[
            'produtos'=>$produtos,
            'vendedores'=>$vendedores
        ]);
    }

    public function store(Request $request) {
        $novoEncomenda = $request->validate([
            'designacao'=>['required','min:3','max:100'],
            'observacoes'=>['nullable','min:3','max:255'],
        ]);
        $produtos = $request->id_produto;
        $vendedores = $request->id_vendedor;

        $encomenda = Encomenda::create($novoEncomenda);

        $encomenda->produtos()->attach($produtos);
        $encomenda->vendedores()->attach($vendedores);

        return redirect()->route('encomendas.show',[
            'id'=>$encomenda->id_encomenda
        ]);
    }



    public function edit (Request $request) {
        $idEncomenda = $request->id;

        $produtos=Produto::all();
        $vendedores=Vendedor::all();

        $encomenda = Encomenda::where('id_encomenda', $idEncomenda)->with(['produtos','vendedores'])->first();

        $produtosEncomenda = [];
        $vendedoresEncomenda = [];

        foreach ($encomenda->produtos as $produto) {
            $produtosEncomenda[] = $produto->id_produto;
        }
        foreach ($encomenda->vendedores as $vendedor) {
            $vendedoresEncomenda[] = $vendedor->id_vendedor;
        }

        return view('encomendas.edit',[
            'encomenda'=>$encomenda,
            'produtos'=>$produtos,
            'produtosEncomenda'=>$produtosEncomenda,
            'vendedores'=>$vendedores,
            'vendedoresEncomenda'=>$vendedoresEncomenda
        ]);
    }

    public function update (Request $request){
        $idEncomenda = $request->id;
        $encomenda = Encomenda::findOrFail($idEncomenda);

        $atualizarEncomenda=$request->validate([
            'designacao'=>['required','min:3','max:100'],
            'observacoes'=>['nullable','min:3','max:255'],
        ]);

        $produtos=$request->id_produto;
        $vendedores = $request->id_vendedor;

        $encomenda->update($atualizarEncomenda);

        $encomenda->produtos()->sync($produtos);
        $encomenda->vendedores()->sync($vendedores);

        return redirect()->route('encomendas.show',[
            'id'=>$encomenda->id_encomenda
        ]);
    }
    public function delete (Request $request) {
        $idEncomenda=$request->id;
        $encomenda = Encomenda::where('id_encomenda', $idEncomenda)->first();
        return view('encomendas.delete',[
            'encomenda'=>$encomenda
        ]);
    }

    public function destroy (Request $request) {
        $idEncomenda = $request->id;

        $encomenda = Encomenda::findOrFail($idEncomenda);
        $produtosEncomenda = Encomenda::findOrFail($idEncomenda)->produtos;
        $vendedoresEncomenda = Encomenda::findOrFail($idEncomenda)->vendedores;

        $encomenda->produtos()->detach($produtosEncomenda);
        $encomenda->vendedores()->detach($vendedoresEncomenda);

        $encomenda->delete();

        return redirect()->route('encomendas.index')->with('mensagem','Encomenda eliminada!');
    }
}

