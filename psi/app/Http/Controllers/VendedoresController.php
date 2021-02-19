<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Encomenda;

class VendedoresController extends Controller
{
    public function index(){
    	$vendedores = Vendedor::paginate(10);

    	return view ('vendedores.index', [
    		'vendedores'=>$vendedores
    	]);
    }


    public function show (Request $request){

    	$idVendedor=$request->id;


        $vendedor=Vendedor::where('id_vendedor', $idVendedor)->with('encomendas')->first();

    	return view('vendedores.show', [
    			'vendedor'=>$vendedor
    	]);
    }

    public function create(){
        $encomendas=Encomenda::all();
        return view('vendedores.create',[
            'encomendas'=>$encomendas
        ]);
    }


    public function store(Request $request) {
        $novoVendedor = $request->validate([
            'nome'=>['required','min:3','max:50'],
            'especialidade'=>['nullable','min:3','max:2000'],
            'email'=>['nullable','min:3','max:30'],
        ]);

        $encomendas = $request->id_encomenda;

        $vendedor = Vendedor::create($novoVendedor);

        $vendedor->encomendas()->attach($encomendas);

        return redirect()->route('vendedores.show',[
            'id'=>$vendedor->id_vendedor
        ]);
    }



    public function edit (Request $request) {
        $idVendedor = $request->id;

        $encomendas = Encomenda::all();

        $vendedor = Vendedor::where('id_vendedor', $idVendedor)->with('encomendas')->first();

        $encomendasVendedor = [];

        foreach ($vendedor->encomendas as $encomenda) {
            $encomendasVendedor[] = $encomenda->id_encomenda;
        }

        return view('vendedores.edit',[
            'vendedor'=>$vendedor,
            'encomendas'=>$encomendas,
            'encomendasVendedor'=>$encomendasVendedor
        ]);
    }

    public function update (Request $request){
        $idVendedor = $request->id;
        $vendedor = Vendedor::findOrFail($idVendedor);

        $atualizarVendedor=$request->validate([
            'nome'=>['required','min:3','max:50'],
            'especialidade'=>['nullable','min:3','max:2000'],
            'email'=>['nullable','min:3','max:30'],
        ]);

        $encomendas=$request->id_encomenda;

        $vendedor->update($atualizarVendedor);

        $vendedor->encomendas()->sync($encomendas);

        return redirect()->route('vendedores.show',[
            'id'=>$vendedor->id_vendedor
        ]);
    }
    public function delete (Request $request) {
        $idVendedor=$request->id;
        $vendedor =Vendedor::where('id_vendedor', $idVendedor)->first();
        return view('vendedores.delete',[
            'vendedor'=>$vendedor
        ]);
    }

    public function destroy (Request $request) {
        $idVendedor = $request->id;

        $vendedor = Vendedor::findOrFail($idVendedor);

        $encomendasVendedor = Vendedor::findOrFail($idVendedor)->encomenda;

        $vendedor->encomendas()->detach($encomendasVendedor);

        $vendedor->delete();

        return redirect()->route('vendedores.index')->with('mensagem','Vendedor eliminado!');
    }
}
