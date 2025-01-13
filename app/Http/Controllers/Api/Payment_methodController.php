<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment_methodResource;
use App\Models\Payment_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Payment_methodController extends Controller
{
    public function index(){
        $payment_methods = Payment_method::all();
            return new Payment_methodResource(true,  "Get All Resourse", $payment_methods);

        return response()->json([
            "status" => true,
            "message" => "Get All Resourse",
            "Data" => $payment_methods
        ], 200);
    }

    public function store(Request $request) {

        // membuat validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'account_number' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        $image = $request->file('image');
        $image->store('payment_methods', 'public');

        // membuat data genre
        $payment_method = Payment_method::create([
            'name' => $request->name,
            'account_number' =>  $request->account_number,
            'image' =>  $image->hashName(),
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added succesfully!",
            "data" => $payment_method
        ], 201);
    }

    public function show(string $id) {
        $payment_method = Payment_method::find($id);

        if(!$payment_method){
            return response()->json([
                "status" => false,
                "message" => "Resorce not found",
            ], 404);
        };

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $payment_method
        ], 200);
    }

    public function update(Request $request, string $id) {
        // cari data payment
        $payment_method = Payment_method::find($id);

        if (!$payment_method) {
          return response()->json([
            "success" => false,
            "message" => "Resource not found!"
          ], 404);
        }

        // membuat validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'account_number' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()){
          return response()->json([
            "success" => false,
            "message" => $validator->errors()
          ], 422);
        }

        // $genre->update($request->only("name", "description"));

        $payment_method->update([
            'name' => $request->name,
            'account_number' =>  $request->account_number,
        ]);


        // ....upload image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image->store('payments_methods', 'public');

            if ($payment_method->image) {
                Storage::disk('public')->delete('payments_methods/' . $payment_method->image);
            }

            $data['image'] = $image->hashName();
        }

         //update data baru
         $payment_method->update($data);

        return response()->json([
          "success" => true,
          "message" => "Resource updated successfully!",
          "data" => $payment_method
        ], 200);
    }

    public function destroy (string $id) {
        $payment_method = Payment_method::find($id);

        if (!$payment_method) {
            return response()->json([
                "succes" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        $payment_method->delete();

        return response()->json([
            "success" => true,
            "messege" => "Resource deleted succesgully!",
        ],200);
    }
}
