<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str; 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        
        if($request->ajax()){
            
            $data=Product::select('categories.name','products.img','products.id','products.description','products.codigo','products.stock','products.price_compra','products.price_venta','products.date','products.category_id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->orderBy('id', 'desc')->get();


            return response()->json($data);

        }else{
            return view('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
         
          $file = $request->file('img');

         $nombre ='/producto/'.time()."_".$file->getClientOriginalName();
         Storage::disk('public')->put($nombre,  \File::get($file));

         $data              = new Product;
         $data->description = $request->description;
         $data->codigo      = $request->codigo;
         $data->stock       = $request->stock;
         $data->price_compra= $request->price_compra;
         $data->price_venta = $request->price_venta;
         $data->date        = $request->date;
         $data->category_id = $request->category_id;
         $data->img = $nombre;
         $data->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         if($request->file('img'))
         {

             $file = $request->file('img');

             $nombre ='/producto/'.time()."_".$file->getClientOriginalName();
             Storage::disk('public')->put($nombre,  \File::get($file));

             $data              =Product::findOrFail($request->id);
             $data->description = $request->description;
             $data->codigo      = $request->codigo;
             $data->stock       = $request->stock;
             $data->price_compra= $request->price_compra;
             $data->price_venta = $request->price_venta;
             $data->date        = $request->date;
             $data->category_id = $request->category_id;
             $data->img = $nombre;
             $data->save();

        }else
        {
             $data              =Product::findOrFail($request->id);
             $data->description = $request->description;
             $data->codigo      = $request->codigo;
             $data->stock       = $request->stock;
             $data->price_compra= $request->price_compra;
             $data->price_venta = $request->price_venta;
             $data->date        = $request->date;
             $data->category_id = $request->category_id;
             $data->save(); 
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete($id);
    }
}
