<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Grado;
use Validator;
use App\Http\Resources\grado as gradoresource;

class GradoController extends BaseController
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grados = Grado::all();

        return $this->sendResponse(gradoresource::collection($Grados), 'Listado de Grados.');
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
            'nom_grado' => 'required',
            'desc_grado' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $grado = Grado::create($input);

        return $this->sendResponse(new gradoresource($grado), 'Ya se ha registrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado = Grado::find($id);

        if (is_null($grado)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new gradoresource($grado), 'Product retrieved successfully.');
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
        $grado=Grado::findOrFail($id);
        $validator = Validator::make($input, [
            'nom_grado' => 'required',
            'desc_grado' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $grado->nom_grado = $input['nom_grado'];
        $grado->desc_grado = $input['desc_grado'];
        $grado->save();

        return $this->sendResponse(new gradoresource($grado), 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$grado=Grado::findOrFail($id);
        $grado->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
