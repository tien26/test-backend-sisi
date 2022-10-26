<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    public function index()
    {
        $product = Products::all();

        foreach ($product as $value) {
            $data[] = [
                'id' => $value['id'],
                'code' => $value['code'],
                'name' => $value['name'],
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
            'code' => 'string|required|unique:products',
            'name' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $product = Products::create([
            'code' => $request->get('code'),
            'name' => $request->get('name')
        ]);

        return response()->json([
            'message' => 'Created success',
            'user' => $product,
        ], 201);
    }
}
