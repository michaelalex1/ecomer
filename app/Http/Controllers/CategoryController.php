<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        
        

        if($request->ajax())
        {
            
             $data=Category::orderBy('id', 'desc')
                        ->where('parent_id', '0')
                        ->get();

         $category = array();

         foreach ($data as $registro) {
                $hijo=Category::orderBy('id', 'desc')
                        ->where('parent_id', $registro['id'])
                        ->get();
               $category[] = array('id'=>$registro['id'],'name'=>$registro['name'],'description'=>$registro['description'],'hijo'=>$hijo) ;        
          }
    
    
        return response()->json($category);

        }else{
            return view('home');
        }

    }

     public function list_category()
   {
        
         $data=Category::orderBy('id', 'desc')
                        ->where('parent_id', '0')
                        ->get();

         $category = array();

         foreach ($data as $registro) {

                $hijo=DB::table('categories')      
                        ->select('categories.id as value', 'categories.name as text')
                        ->orderBy('id', 'desc')
                        ->where('parent_id', $registro['id'])
                        ->get();

               $category[] = array('value'=>$registro['id'],'text'=>$registro['name'],'hijo'=>$hijo) ;        
          }
    
    
        return response()->json($category);

        // $data=DB::table('categories')      
        //             ->select('categories.id as value', 'categories.name as text')
        //             ->get();


                  
         //return response()->json($data);
   }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data              = new Category;
         $data->name        = $request->name;
         $data->description = $request->description;
         $data->parent_id= $request->parent_id;
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
        $data              =Category::findOrFail($request->id);
        $data->name        =$request->name;
        $data->description =$request->description;
        $data->save();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete($id);
    }

    public function list_category_sub($id)
    {

       $data=DB::table('categories')      
                        ->select('categories.id as value', 'categories.name as text')
                        ->orderBy('id', 'desc')
                        ->where('parent_id', $id)
                        ->get();

        return response()->json($data);

    }



}
