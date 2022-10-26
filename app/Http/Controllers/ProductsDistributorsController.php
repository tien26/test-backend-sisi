<?php

namespace App\Http\Controllers;

use App\Models\Distributor_products;
use App\Models\Distributors;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsDistributorsController extends Controller
{
    public function index()
    {
        $distributor = Distributor_products::with('product', 'distributor')->get();

        foreach ($distributor as  $value) {
            $data[] = [
                'id' => $value['id'],
                'product' => [
                    "id" => $value->product['id'],
                    "code" => $value->product['code'],
                    "name" => $value->product['name'],
                ],
                'distributor' => [
                    "id" => $value->distributor['id'],
                    "code" => $value->distributor['code'],
                    "name" => $value->distributor['name'],
                ],
                'price' => $value['price']
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
            'product_id' => 'required',
            'distributor_id' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $distributor_product = Distributor_products::create([
            'product_id' => $request->get('product_id'),
            'distributor_id' => $request->get('distributor_id'),
            'price' => $request->get('price'),
        ]);

        return response()->json([
            'message' => 'Created success',
            'user' => $distributor_product,
        ], 201);
    }
}
