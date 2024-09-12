<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Eixo;

class CursoController extends Controller
{
    
    public function index()
    {
        $data = Curso::with(['eixo'])->get();
        return view('curso.index', compact('data')); 
    }

   
    public function create()
    {   
        $eixos = Eixo::orderBy('name')->get();
        return view('curso.create', compact('eixos'));
    }

    public function store(Request $request)
    {
        $eixo = Eixo::find($request->eixo);

        if(isset($eixo)){
            $curso = new Curso();
            $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
            $curso->abreviatura = mb_strtoupper($request->abreviatura, 'UTF-8');
            $curso->duracao =$request->duracao;
            $curso->eixo()->associate($eixo);
            $curso->save();
            
            return redirect()->route('curso.index');


        }
        return "<h1>Eixo nao encontrado!!</h1>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $curso = Curso::find($id);

        if(isset($curso)){
            return view('curso.show', compact('curso'));
        }
        return "<h1>Curso não encontrado!!</h1>";


    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        $eixos = Eixo::orderBy('name')->get();

        if(isset($curso)){
            return view('curso.edit', compact(['curso', 'eixos']));    
        }
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
        $curso = Curso::find($id);
        $eixo = Eixo::find($request->eixo);
        
        if(isset($eixo) && isset ($curso)){
            
            $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
            $curso->abreviatura = mb_strtoupper($request->Abreviatura, 'UTF-8');
            $curso->duracao =$request->duracao;
            $curso->eixo()->associate($eixo);
            $curso->save();
            
            return redirect()->route('curso.index');
    }
}

    
    public function destroy($id)
    {
        
        $curso = Curso::find($id);

        if(isset($curso)){
            $curso->delete();
            return redirect()->route('curso.index');
        }

        return "<h1>Curso não encontrado!!</h1>";
    }
}