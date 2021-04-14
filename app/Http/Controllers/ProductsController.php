<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CategoriesController as Categories;
use App\Http\Controllers\CartController;
use App\Models\Cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
    * Retorna Todos os produtos para view - admin
    */
    public function index()
    {
        $products = DB::table('products')
        ->select('id', 'name', 'description', 'price', 'url')
        ->paginate(12);

        return view('shop.admin.products.products-list', ['products' => $products]);
    }

    /*
    *Listagem de produtos - cliente
    */
    public function list(){
        $categories = new Categories;
        $all_categories = $categories->list();

        $products = DB::table('products')->paginate(6);

        return view('shop.welcome', ['products' => $products]);
    }

    /*
    * Busca produtos por nome - cliente
    */
    public function search(Request $request){
        $products = DB::table('products')
        ->where('name', 'LIKE', '%' . $request->search . '%')
        ->paginate(9);

        return view('shop.products', ['products' => $products]);
    }

    public function productDetail($url){
        $product = DB::table('products')
        ->where('url', $url)
        ->first();

        //Verifica se o produto foi encontrado
        if(!empty($product)){
            return view('shop.product-detail', ['product' => $product]);
        }else{
            return redirect()->route('fallback', ['fallbackPlaceholder' => '404']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.products.products-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validação de campos
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:191',
            'price' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            'weight' => 'required',
        ]);

        //Verifica se há erros
        if($validator->fails()){
            return redirect()
            ->route('products.create')
            ->withErrors($validator)
            ->withInput();
        }

       $nameFile = null; //Inicializa variavel para salvar nome da imagem

       //Se a imagem for valida executa o bloco
       if($request->hasFile('image') && $request->file('image')->isValid()){

        $name = str_replace(' ', '-', $request->name); //Atribuindo o nome de url a imagem
        $extension = $request->image->extension(); //Requisitando extensão
        $nameFile = "{$name}.{$extension}"; //Montando nome completo do arquivo

        $upload = $request->image->storeAs('products',$nameFile); //Salvando no diretorio

        if ( !$upload ) //Se o upload tiver falha, retorna com erro
            return redirect()
            ->back()
            ->with('error', 'Falha ao fazer upload')
            ->withInput();
       }

        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' =>  str_replace(',', '.', $request->price),
            'width' =>  str_replace(',', '.', $request->width),
            'height' =>  str_replace(',', '.', $request->height),
            'length' =>  str_replace(',', '.', $request->length),
            'weight' =>  str_replace(',', '.', $request->weight),
            'url' => str_replace(' ', '-', $request->name)
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')
        ->where('id', '=', $id)
        ->first();

        return view('shop.admin.products.products-edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:191',
            'price' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            'weight' => 'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('products.edit', $product->id)
            ->withErrors($validator)
            ->withInput();
        }

        DB::table('products')->where('id', $product->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => str_replace(',', '.', $request->price),
            'width' => str_replace(',', '.', $request->width),
            'height' => str_replace(',', '.', $request->height),
            'length' => str_replace(',', '.', $request->length),
            'weight' => str_replace(',', '.', $request->weight),
            'url' => str_replace(' ', '-', $request->name)
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        DB::table('products')->delete($products->id);

        return redirect()->route('products.index');
    }
}
