<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Book;


    class BookController extends Controller
    {
        public function index()
        {
            $movie = new Book;
            $movies = $movie->getAllBooks();

            return response()->json($movies);
        }
    }

?>