<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        if($books->isEmpty()){
            return response()->json([
                "status" => true,
                "message" => "Get All Resourse",
            ], 200);
        };

        return response()->json([
            "status" => true,
            "message" => "Get All Resourse",
            "Data" => $books
        ], 200);
    }

    public function store(Request $request) {

        // 1. validator
        $validator = Validator::make($request->all(), [
            "title" => "required|string",
            "description" => "required|string",
            "price" => "required|numeric|min:0",
            "stock" => "required|integer|min:0",
            "cover_photo" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "genre_id" => "required|exists:genres,id",  // bagian genres,id (bagian ,id harus nyambung)
            "author_id" => "required|exists:authors,id"
        ]);

        // 2. check validator
        if ($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }
        // 3. upload image
        $image = $request->file('cover_photo');
        $image->store('book', 'public');

        // 4. insert data
        $book = Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "cover_photo" => $image->hashName(),
            "genre_id" => $request->genre_id,
            "author_id" => $request->author_id
        ]);

        // 5. return response
        return response()->json([
            "success" => true,
            "message" => "Resource added succesfully!",
            "data" => $book
        ], 201);
    }

    public function show(string $id) {
        $book = Book::find($id);
        if(!$book){
            return response()->json([
                "status" => false,
                "message" => "Resorce not found",
            ], 404);
        };

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $book
        ], 200);
    }
}