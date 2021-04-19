<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::withTrashed()->get();
        $categorias=Categoria::all();
        return view('productos/index')
        ->with('productos', $productos)
        ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();
        $categorias=Categoria::all();
        return view('productos/create')
        ->with('productos', $productos)
        ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
            $img=$request->img;
            $nameimg=uniqid().$img->getClientOriginalName();
            $img->move(public_path()."/img/productos", $nameimg);
        }
        $productos= new Producto();
        $productos->idc=$request->idc;
        $productos->nombre=$request->nombre;
        $productos->existencia=$request->existencia;
        $productos->descripcion=$request->descripcion;
        $productos->precio=$request->precio;
        $productos->img=$nameimg;
        $productos->save();
        return redirect("/productos")->with('success', 'ok');
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
    public function edit($idpr)
    {
        $productos = Producto::find($idpr);
        $categorias=Categoria::all();
        return view('productos/edit')
        ->with('productos',$productos)
        ->with('categorias', $categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpr)
    {
        $productos=Producto::findOrFail($idpr);
        if(file_exists(public_path()."/img/productos/".$productos->img)){
            if($request->hasFile('img')){
                unlink(public_path()."/img/productos/".$productos->img);
                $img=$request->img;
                $nameimg=uniqid().$img->getClientOriginalName();
                $img->move(public_path()."/img/productos/", $nameimg);
                $productos->img=$nameimg;
            }else{
                if($request->hasFile('img')){
                    $img=$request->img;
                    $nameimg=uniqid().$img->getClientOriginalName();
                    $img->move(public_path()."/img/productos/", $nameimg);
                    $productos->img=$nameimg;
                }
            }
        }else{
            if($request->hasFile('img')){
                $img=$request->img;
                $nameimg=uniqid().$img->getClientOriginalName();
                $img->move(public_path()."/img/productos/", $nameimg);
                $productos->img=$nameimg;
            }
        }
        $productos->idc=$request->idc;
        $productos->nombre=$request->nombre;
        $productos->existencia=$request->existencia;
        $productos->descripcion=$request->descripcion;
        $productos->precio=$request->precio;
        $productos->img=$nameimg;
        $productos->save();
        return redirect("/productos")->with('success', 'edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function desactivaproducto($idpr)
    {
        $productos=Producto::Find($idpr);
        $productos->delete();
        return redirect('productos')->with('success', 'desactiver');
    }

    public function activarproducto($idpr)
    {
        $productos=Producto::withTrashed()->where('idpr',$idpr)->restore();
        return redirect('productos')->with('success', 'activer');
    }

    public function destroy($idpr)
    {
        $productos=Producto::withTrashed()->find($idpr);
        if(file_exists(public_path()."/img/productos/".$productos->img)){
            unlink(public_path()."/img/productos/".$productos->img);
            }
            $productos->forceDelete();
            return redirect('productos')->with('success', 'delete');
    }
}
