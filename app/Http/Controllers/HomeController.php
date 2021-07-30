<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'Price Monitoring';
        return view('home.index', compact('title'));
    }

    public function list()
    {

        $title = 'List Price Monitoring';
        $result = (new ProductService())->get();
        return view('home.list', compact('title', 'result'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        list($result, $id) = (new ProductService)->handle($request->all()); 
        $message = ['class'=> 'primary', 'status' => 'Success', 'message' =>  'Added product successfully' ];
        if(!$result)
        {
            $message = ['class'=> 'danger', 'status' => 'Failed', 'message' => 'Failed for added product'];
            return redirect()->route('form')->with('message', $message);

        }

        return redirect()->route('detail', ['id' => $id])->with('message', $message);
       
    }

    public function show(Request $request, $id)
    {
        $product = (new ProductService)->first($id);
        
        $title = 'Detail '.$product->product_name;
        $images = json_decode($product->images);
        $prices = $product->histories;
        return view('details.index', compact('product', 'title', 'images', 'prices'));
    }

}
