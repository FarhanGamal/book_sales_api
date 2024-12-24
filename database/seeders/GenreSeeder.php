<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fiksi',
            'description' => 'model atau dasar cerita sebuah karya sastra yang bersifat imajinatif dan rekaan, tidak berdasarkan pada kenyataan atau fakta yang sebenarnya'
        ]);
        Genre::create([
            'name' => 'Horror',
            'description' => 'genre fiksi spekulatif yang bertujuan untuk menakut-nakuti, membuat takut, atau mengganggu penontonnya'
        ]);
        Genre::create([
            'name' => 'Romance',
            'description' => 'genre fiksi yang menceritakan kisah cinta dan hubungan romantis antara dua tokoh atau lebih'
        ]);
        Genre::create([
            'name' => 'Fantasy',
            'description' => 'genre cerita yang berlatar di dunia khayalan dan melibatkan unsur-unsur yang tidak mungkin ada di dunia nyata'
        ]);
        Genre::create([
            'name' => 'Mystery',
            'description' => 'genre fiksi yang menceritakan tentang pemecahan kejahatan atau peristiwa misterius oleh seorang detektif atau profesional lainnya'
        ]);
    }
}
