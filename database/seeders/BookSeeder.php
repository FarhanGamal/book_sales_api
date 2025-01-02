<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Hobbit',
            'description' => 'Sang Hobbit adalah sebuah buku novel fantasi yang ditulis oleh J. R. R. Tolkien dengan alur cerita laksana dongeng. Buku ini pertama kali diterbitkan di Inggris pada 21 September 1937',
            'price' => '52000',
            'stock' => '50',
            'cover_photo' => 'Hobbit.png',
            'genre_id' => '1',
            'author_id' => '1'
        ]);
        Book::create([
            'title' => 'The Dark Tower',
            'description' => 'The Dark Tower adalah seri delapan novel, satu novel pendek, dan buku anak-anak yang ditulis oleh penulis Amerika Stephen King .',
            'price' => '40000',
            'stock' => '20',
            'cover_photo' => 'Tower.png',
            'genre_id' => '2',
            'author_id' => '2'
        ]);
        Book::create([
            'title' => 'In Bed With the Devil',
            'description' => 'Lady Catherine Mabry, putri Duke of Greystone, adalah gadis manja dan keras kepala yang tidak pernah merasakan kepahitan hidup. Demi menyelamatkan sahabatnya, Winnie, Catherine mendatangi satu-satunya orang yang dianggapnya mampu menyingkirkan Duke of Avendale, suami Winnie yang kejam. Orang itu adalah Lucian Langdon, sang Devil Earl. Sebagai imbalannya, Catherine bersedia memenuhi apa pun permintaan sang earl.',
            'price' => '30000',
            'stock' => '25',
            'cover_photo' => 'InBedWiththeDevil.png',
            'genre_id' => '3',
            'author_id' => '3'
        ]);
        Book::create([
            'title' => 'Mere Christianity',
            'description' => 'Mere Christianity adalah sebuah buku teologi karya C. S. Lewis, yang diadaptasi dari suatu seri pembicaraan radio BBC yang direkam pada tahun 1942 sampai 1944, ketika Lewis masih di Oxford pada masa Perang Dunia II.',
            'price' => '52000',
            'stock' => '15',
            'cover_photo' => 'Christianity.png',
            'genre_id' => '4',
            'author_id' => '4'
        ]);
        Book::create([
            'title' => 'Death On The Nile',
            'description' => 'Pembunuhan di Sungai Nil atau Death on the Nile adalah sebuah buku fiksi detektif karya Agatha Christie dan pertama kali diterbitkan di Inggris oleh Collins Crime Club pada 1 November 1937 dan di Amerika Serikat oleh Dodd, Mead and Company pada tahun berikutnya.',
            'price' => '64000',
            'stock' => '20',
            'cover_photo' => 'DeathOnTheNile.png',
            'genre_id' => '5',
            'author_id' => '5'
        ]);
    }
}
