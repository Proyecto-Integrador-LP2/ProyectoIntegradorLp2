<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Docente;
use Validator;
use App\Http\Resources\docente as docenteresource;

class DocenteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Docentes = Docente::all();

        return $this->sendResponse(docenteresource::collection($Docentes), 'Listado de Docentes.');
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
            'user_id' => 'required',
            'docente_cod_docente' => 'required',
            'docente_descripcion' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $docente = Docente::create($input);

        return $this->sendResponse(new docenteresource($docente), 'Ya se ha registrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        if (is_null($docente)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new docenteresource($docente), 'Product retrieved successfully.');
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
        $docente=Docente::findOrFail($id);
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'docente_cod_docente' => 'required',
            'docente_descripcion' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $docente->user_id = $input['user_id'];
        $docente->docente_cod_docente = $input['docente_cod_docente'];
        $docente->docente_descripcion = $input['docente_descripcion'];
        $docente->save();

        return $this->sendResponse(new docenteresource($docente), 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$docente=Docente::findOrFail($id);
        $docente->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
