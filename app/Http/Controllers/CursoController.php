<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Curso;
use Validator;
use App\Http\Resources\curso as cursoresource;

class CursoController extends BaseController
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cursos = Curso::all();

        return $this->sendResponse(cursoresource::collection($Cursos), 'Products retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'curso_nombre' => 'required',
            'curso_descripcion' => 'required',
            'curso_estado' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $curso = Curso::create($input);

        return $this->sendResponse(new cursoresource($curso), 'Product created successfully.');
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

        if (is_null($curso)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new cursoresource($curso), 'Product retrieved successfully.');
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
        $input = $request->all();
        $curso=Curso::findOrFail($id);
        $validator = Validator::make($input, [
            'curso_nombre' => 'required',
            'curso_descripcion' => 'required',
            'curso_estado' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $curso->curso_nombre = $input['curso_nombre'];
        $curso->curso_descripcion = $input['curso_descripcion'];
        $curso->curso_estado = $input['curso_estado'];
        $curso->save();

        return $this->sendResponse(new cursoresource($curso), 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$curso=Curso::findOrFail($id);
        $curso->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
