<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Products\Entities\Product;
use Session;

class ProductsController extends Controller
{
    protected $products;

    public function __construct()
    {
        $this->products = Product::get();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('products::products.index')
            ->withProducts($this->products);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('products::products.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')){
            $name = $input['name'];
            $formtedName = str_replace([' ','%'], '-', $name);

            $imageName = $formtedName . '-' . (string) rand(00000, 99999)  . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/product', $imageName);
            $input['image'] = $imageName;
        }
        $product = Product::create($input);
//        $type->attributeLabels()->sync((array) $request->input('attribute_label_list'));
        Session::flash('success','Product has been added !');
        return redirect()->route('product.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Product $product)
    {
        return view('products::products.show')
            ->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Product $product)
    {
        return view('products::products.edit')
            ->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        if ($request->hasFile('image')){
            $name = $input['name'];
            $formtedName = str_replace([' ','%'], '-', $name);

            $imageName = $formtedName . '-' . (string) rand(00000, 99999)  . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/product', $imageName);
            $input['image'] = $imageName;
        }
        $product->update($input);
//        $type->attributeLabels()->sync((array) $request->input('attribute_label_list'));
        Session::flash('success','Product has been updated !');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->update(['status' => 1]);
        Session::flash('success','Product has been deleted !');
        return redirect()->route('product.index');
    }
}
