<?php

namespace App\Http\Controllers;

use App\App;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = App::orderBy('id','desc')->paginate(10);
        $categories = Category::orderBy('name')->get();
        return view('appsAll',['apps'=>$apps, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('newApp',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app = New App;
        
        $rules = [
           'category_id' => 'required',
           'name' => 'required',
           'price'=> 'required|numeric',
           'description' => 'required|max:250',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        $message=[
            'required' => 'El campo es obligatorio',
            'numeric' => 'El campo solo admite números',
            'description.max' => 'El campo descripción solo acepta :max caracteres',
            'image' => 'La imagen debe ser en formato: jpeg,png,jpg,gif,svg',
            'mimes' => 'La imagen debe ser en formato: jpeg,png,jpg,gif,svg',
            'image.max' => 'La imagen debe tener como maximo :max kb'
        ];

        $validate = $request->validate($rules,$message);

        /* CREAR APP */
        $app->category_id = $request->category_id;
        $app->name = $request->name;
        $app->price = $request->price;
        $app->description = $request->description;

        $imageName = $request->name.'.'.request()->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('img'), $imageName);
        $app->image = $imageName;

        $app->save();

        /* TABLE PIVOT */
        $idUser = Auth::user()->id;
        $app->users()->attach($idUser);



        return redirect()->action('UserController@show',$idUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function show(App $app, $id)
    {
        $app = App::where('id',$id)->first();
        return view('appDetail',['app'=>$app]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function edit(App $app, $id)
    {
        $app = App::where('id',$id)->first();
        return view('updateApp',['app'=>$app]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App $ap, $id)
    {
        $app = App::find($id);

        $rules = [
            'price'=> 'required|numeric',
            'description' => 'required|max:250',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
 
        $message=[
            'required' => 'El campo es obligatorio',
            'numeric' => 'El campo solo admite números',
            'description.max' => 'El campo descripción solo acepta :max caracteres',
            'image' => 'La imagen debe ser en formato: jpeg,png,jpg,gif,svg',
            'mimes' => 'La imagen debe ser en formato: jpeg,png,jpg,gif,svg',
            'image.max' => 'La imagen debe tener como maximo :max kb'
        ];
 
        $validate = $request->validate($rules,$message);

        $imageName = $app->image;

        if($request->file('image')){
            $imageName = $app->name.'.'.time().'.'.request()->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img'), $imageName);
        }
        

        $app->update([
            'image' => $imageName,
            'price' => $request->price,
            'description' => $request->description
        ]);

        $idUser = Auth::user()->id;

        return redirect()->action('UserController@show',$idUser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function destroy(App $app, $id)
    {
        $idUser = Auth::user()->id;
        
        $app->find($id)->users()->detach($idUser);
        $app->find($id)->delete();

        return redirect()->action('UserController@show',$idUser);
    }

    /**
     * View of Remove.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function remove(App $app,$id){

        $app = App::where('id',$id)->first();
        return view('removeApp',['app'=>$app]);
    }
}
