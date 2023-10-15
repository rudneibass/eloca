<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresasRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Empresa::orderBy('razao_social')->get();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function search($search_param)
    {
        #return response()->json(['msg'=>$search_param], 500);
        try {
            $data = Empresa::orderByDesc('razao_social')->get();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasRequest $request)
    {
        try {   

            $json = $request->getContent();
            $request_data = json_decode($json, true);
            $request_data['recnum'] = Empresa::max('recnum') + 1;
            $response_data = Empresa::create($request_data);

            $data = Empresa::where('codigo', $response_data->id)->get();

            return response()->json($data, 201);

        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $obj = Empresa::where('codigo', $id)->get();
            if (!$obj)
                return response()->json(['message'=> 'Registro não localizado no banco de dados'], 404);
            
            $data = $obj;
            return response()->json($data, 200);

        } catch (\Exception $e) {
            return response()->json($e, 500);
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
        try {
            $obj = Empresa::where('codigo', $id);
            if (!$obj)
                return response()->json(['message'=> 'Registro não localizado no banco de dados'], 404);
            
            $json = $request->getContent();
            $request_data = json_decode($json, true);

            $obj->update($request_data);

            $data = Empresa::where('codigo', $id)->get();

            return response()->json($data, 201);

        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $obj = Empresa::where('codigo', $id);
            if (!$obj)
                return response()->json(['message'=> 'Registro não localizado no banco de dados'], 404);
            
            $data = Empresa::where('codigo', $id)->get();

            $obj->delete();
            
            return response()->json($data, 201);

        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }
}
