<?php

namespace App\Http\Controllers;

use App\Models\Distributors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorsController extends Controller
{
    public function index()
    {
        $distributor = Distributors::all();

        foreach ($distributor as  $value) {
            $data[] = [
                'id' => $value['id'],
                'code' => $value['code'],
                'name' => $value['name'],
                'address' => $value['address'],
            ];
        }

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'string|required|unique:distributors',
            'name' => 'string|required',
            'address' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $distributor = Distributors::create([
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'address' => $request->get('address'),
        ]);

        return response()->json([
            'message' => 'Created success',
            'user' => $distributor,
        ], 201);
    }
}
