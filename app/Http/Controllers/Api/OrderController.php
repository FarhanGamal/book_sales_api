<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
            return new OrderResource(true,  "Get All Resourse", $orders);
            
        return response()->json([
            "status" => true,
            "message" => "Get All Resourse",
            "Data" => $orders
        ], 200);
    }

    public function store(Request $request) {

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "order_number" => "required|string",
            "customer_id" => "required|exists:customers,id",
            "book_id" => "required|exists:books,id",
            "total_amount" => "required|numeric|min:0",
            "status" => "required|in:'pending','processing','shipped','completed','canceled'",
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // membuat data genre
        $order = Order::create([
            "order_number" => $request->order_number,
            "customer_id" => $request->customer_id,
            "book_id" => $request->book_id,
            "total_amount" => $request->stock,
            "status" => $request->status(),
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added succesfully!",
            "data" => $order
        ], 201);
    }

    public function show(string $id) {
        $order = Order::find($id);

        if(!$order){
            return response()->json([
                "status" => false,
                "message" => "Resorce not found",
            ], 404);
        };

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $order
        ], 200);
    }

    public function update(Request $request, string $id) {
        // cari data genre
        $order = Order::find($id);

        if (!$order) {
          return response()->json([
            "success" => false,
            "message" => "Resource not found!"
          ], 404);
        }

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "order_number" => "required|string",
            "customer_id" => "required|exists:customers,id",
            "book_id" => "required|exists:books,id",
            "total_amount" => "required|numeric|min:0",
            "status" => "required|in:'pending','processing','shipped','completed','canceled'"
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()){
          return response()->json([
            "success" => false,
            "message" => $validator->errors()
          ], 422);
        }

        $book = Book::all();
        $orderNumber = 'ORD-' . strtoupper(uniqid());
        $totalAmount = $book->price * $request->quantity;

        $order->update([
            "order_number" => $request->$orderNumber,
            "customer_id" => $request->customer_id,
            "book_id" => $request->book_id,
            "total_amount" => $request->$totalAmount,
            "status" => $request->status(),
        ]);



        return response()->json([
          "success" => true,
          "message" => "Resource updated successfully!",
          "data" => $order
        ], 200);
    }

    public function destroy (string $id) {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                "succes" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        $order->delete();

        return response()->json([
            "success" => true,
            "messege" => "Resource deleted succesgully!",
        ],200);
    }
}
