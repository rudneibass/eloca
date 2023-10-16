<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Cliente::orderBy('razao_social')->get();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function search($search_param)
    {
        try {
            $data = Cliente::where('razao_social', 'LIKE', '%'.$search_param.'%')
                            ->whereOr('sigla', 'LIKE', '%'.$search_param.'%')
                            ->get();
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
    public function store(ClientesRequest $request)
    {
        try {   

            $json = $request->getContent();
            $request_data = json_decode($json, true);
            $request_data['recnum'] = Cliente::max('recnum') + 1;
            $response_data = Cliente::create($request_data);

            $data = Cliente::where('codigo', $response_data->id)->get();

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
            $obj = Cliente::where('codigo', $id)->get();
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
            $obj = Cliente::where('codigo', $id);
            if (!$obj)
                return response()->json(['message'=> 'Registro não localizado no banco de dados'], 404);
            
            $json = $request->getContent();
            $request_data = json_decode($json, true);

            $obj->update($request_data);

            $data = Cliente::where('codigo', $id)->get();

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
            $obj = Cliente::where('codigo', $id);
            if (!$obj)
                return response()->json(['message'=> 'Registro não localizado no banco de dados'], 404);
            
            $data = Cliente::where('codigo', $id)->get();

            $obj->delete();
            
            return response()->json($data, 201);

        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }
}
