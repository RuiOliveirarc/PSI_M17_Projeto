<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\Produto;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::paginate(10);

        return view ('categorias.index', [
            'categorias'=>$categorias
        ]);
    }

    public function show (Request $request){

        $idCategoria=$request->id;

        $categoria= Categoria::where('id_categoria',$idCategoria)->with(['fornecedores','produtos'])->first();

        return view('categorias.show', [
                'categoria'=>$categoria
        ]);
    }


    public function create(){
        $fornecedores=Fornecedor::all();
        $produtos=Produto::all();

        return view('categorias.create',[
            'fornecedores'=>$fornecedores,
            'produtos'=>$produtos
        ]);
    }


    public function store(Request $request) {
        $novoCategoria = $request->validate([
            'designacao'=>['required','min:3','max:50'],
            'icone'=>['nullable','image','max:2000'],
        ]);

        if ($request->hasFile('icone')) {
            $nomeIcon = $request->file('icone')->getClientOriginalName();
            $nomeIcon = time().'_'.$nomeIcon;
            $guardarIcon = $request->file('icone')->StoreAs('public/img',$nomeIcon);
            $novoCategoria['icone'] = $nomeIcon;
        }

        $fornecedores = $request->id_fornecedor;
        $produtos = $request->id_produto;

        $categoria = Categoria::create($novoCategoria);

        $categoria->fornecedores()->attach($fornecedores);
        $categoria->produtos()->attach($produtos);

        return redirect()->route('categorias.show',[
            'id'=>$categoria->id_categoria
        ]);
    }



    public function edit (Request $request) {
        $idCategoria = $request->id;

        $fornecedores = Fornecedor::all();
        $produtos=Produto::all();

        $categoria = Categoria::where('id_categoria', $idCategoria)->with(['fornecedores','produtos'])->first();

        $fornecedoresCategoria = [];
        $produtosCategoria = [];

        foreach ($categoria->fornecedores as $fornecedor) {
            $fornecedoresCategoria[] = $fornecedor->id_fornecedor;
        }
        foreach ($categoria->produtos as $produto) {
            $produtosCategoria[] = $produto->id_produto;
        }

        return view('categorias.edit',[
            'categoria'=>$categoria,
            'fornecedores'=>$fornecedores,
            'fornecedoresCategoria'=>$fornecedoresCategoria,
            'produtos'=>$produtos,
            'produtosCategoria'=>$produtosCategoria
        ]);
    }

    public function update (Request $request){
        $idCategoria = $request->id;
        $categoria = Categoria::findOrFail($idCategoria);
        $iconAntigo = $categoria->icone;

        $atualizarCategoria=$request->validate([
            'designacao'=>['required','min:3','max:50'],
            'icone'=>['nullable','image','max:2000'],
        ]);

        if ($request->hasFile('icone')) {
            $nomeIcon = $request->file('icone')->getClientOriginalName();
            $nomeIcon = time().'_'.$nomeIcon;
            $guardarIcon = $request->file('icone')->StoreAs('public/img',$nomeIcon);

            if (!is_null($iconAntigo)) {
                Storage::Delete('public/img/'.$iconAntigo);
            }

            $atualizarCategoria['icone'] = $nomeIcon;
        }

        $fornecedores=$request->id_fornecedor;
        $produtos=$request->id_produto;

        $categoria->update($atualizarCategoria);

        $categoria->fornecedores()->sync($fornecedores);
        $categoria->produtos()->sync($produtos);

        return redirect()->route('categorias.show',[
            'id'=>$categoria->id_categoria
        ]);
    }


    public function delete (Request $request) {
        $idCategoria=$request->id;
        $categoria =Categoria::where('id_categoria', $idCategoria)->first();
        return view('categorias.delete',[
            'categoria'=>$categoria
        ]);
    }

    public function destroy (Request $request) {
        $idCategoria = $request->id;

        $categoria = Categoria::findOrFail($idCategoria);
        $fornecedoresCategoria = Categoria::findOrFail($idCategoria)->fornecedores;
        $produtosCategoria = Categoria::findOrFail($idCategoria)->produtos;

        $categoria->fornecedores()->detach($fornecedoresCategoria);
        $categoria->produtos()->detach($produtosCategoria);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('mensagem','Categoria eliminada!');
    }
}