<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Book extends Model
    {
        protected $books = [
            [ "id" => 1, "title" => "Don Quixote", "description" => "Don Kisot", "price" => 49000, "stok" => 10, "cover_photo" => "png", "genre_id" => 1, "author_id" => 1 ],
            [ "id" => 2, "title" => "The Little Prince", "description" => "The Little", "price" => 288000, "stok" => 15, "cover_photo" => "png", "genre_id" => 2, "author_id" => 2 ],
            [ "id" => 3, "title" => "Bumi Manusia", "description" => "Bumi Manusia", "price" => 277000, "stok" => 20, "cover_photo" => "png", "genre_id" => 3, "author_id" => 3 ],
            [ "id" => 4, "title" => "Harry Potter", "description" => "Harry Potter", "price" => 700000, "stok" => 25, "cover_photo" => "png", "genre_id" => 4, "author_id" => 4 ],
            [ "id" => 5, "title" => "Sang Pemimpi", "description" => "Sang Pemimpi", "price" => 323000, "stok" => 10, "cover_photo" => "png", "genre_id" => 5, "author_id" => 5 ],
            [ "id" => 6, "title" => "Atomic Habits", "description" => "Atomic Habits", "price" => 335000, "stok" => 15, "cover_photo" => "png", "genre_id" => 6, "author_id" => 6 ],
            [ "id" => 7, "title" => "The Alchemist", "description" => "The Alchemist", "price" => 65000, "stok" => 20, "cover_photo" => "png", "genre_id" => 7, "author_id" => 7 ],
            [ "id" => 8, "title" => "Pride and Prejudice", "description" => "Pride and Prejudice", "price" => 76500, "stok" => 15, "cover_photo" => "png", "genre_id" => 8, "author_id" => 8 ],
            [ "id" => 9, "title" => "Good Bye", "description" => "Good Bye", "price" => 64500, "stok" => 20, "cover_photo" => "png", "genre_id" => 9, "author_id" => 9 ],
            [ "id" => 10, "title" => "The Lonely Stories", "description" => "The Lonely", "price" => 60000, "stok" => 15, "cover_photo" => "png", "genre_id" => 10, "author_id" => 10 ]
        ];


        public function getAllBooks() {
            return $this->books;
        }

    }

?>