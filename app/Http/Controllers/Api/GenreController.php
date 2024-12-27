<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();

        if($genres->isEmpty()){
            return response()->json([
                "status" => true,
                "message" => "Get All Resourse",
            ], 200);
        };

        return response()->json([
            "status" => true,
            "message" => "Get All Resourse",
            "Data" => $genres
        ], 200);
    }

    public function store(Request $request) {

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "description" => "required|string"
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // membuat data genre
        $genre = Genre::create([
            "name" => $request->name,
            "description" => $request->description
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added succesfully!",
            "data" => $genre
        ], 201);
    }

    public function show(string $id) {
        $genre = Genre::find($id);

        // Task:
        // tambahkan error handling ketika id yang dicari tidak ditemukan
        // success = false
        // message = "Resorce not found"
        // error 404
        if(!$genre){
            return response()->json([
                "status" => false,
                "message" => "Resorce not found",
            ], 404);
        };

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $genre
        ], 200);
    }
}
