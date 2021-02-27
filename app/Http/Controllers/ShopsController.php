<?php

namespace App\Http\Controllers;

use App\Shops;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shops::all();
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
        $newShop = Shops::create($request->all());
        
        if($newShop){
            return response()->json(['message'=>'Compra realizada con éxito'],201);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function show(Shops $shops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function edit(Shops $shops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shops $shops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shops = Shops::findOrFail($id);
        if($shops) {
            $shops->delete();
            return response()->json(['message' => 'Compra eliminada']);
        } else {
            return response()->json(['message' => 'Ocurrió un error']);
        }
    }
}
