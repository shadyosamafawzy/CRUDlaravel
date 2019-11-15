<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select('SELECT products.*,categories.cname FROM products LEFT JOIN categories ON products.cat_id = categories.id ');
        return view('allProduct' , ['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::select('SELECT categories.id,categories.cname FROM categories');
        return view('addProduct',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         DB::insert("INSERT INTO `products`(`name`, `description`, `cat_id`) VALUES ('$request->name' , '$request->description' , $request->cat_id)");
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::select("SELECT products.*,categories.cname FROM products LEFT JOIN categories ON products.cat_id = categories.id WHERE products.id = $id");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = $this->show($id) ;
        $categories = DB::select('SELECT categories.id,categories.cname FROM categories');
        return view('updateProduct',['products' => $product,'categories' =>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::insert("UPDATE `products` SET `name`='$request->name',`description`='$request->description',`cat_id`=$request->cat_id WHERE id = $id");
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $delete = DB::select("DELETE FROM `products` WHERE id = $id");
            return redirect('/');

    }
}
