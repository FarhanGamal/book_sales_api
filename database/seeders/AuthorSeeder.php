<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.R.R. Tolkien',
            'photo' => 'Tolkien.png',
            'bio' => 'Dianggap sebagai Bapak Genre Fantasi, Tolkien dikenal lewat karya-karyanya seperti The Hobbit, The Lord of the Rings, dan The Silmarillion',
        ]);
        Author::create([
            'name' => 'Stephen King',
            'photo' => 'Stephen.png',
            'bio' => 'Penulis produktif yang dikenal sebagai "Raja Horor". Ia menulis puluhan novel horor, misteri, paranormal, dan fiksi ilmiah',
        ]);
        Author::create([
            'name' => 'Lorraine Heath',
            'photo' => 'Lorraine.png',
            'bio' => 'Penulis yang menghasilkan lebih dari selusin seri berbeda dalam berbagai subgenre, mulai dari sejarah hingga paranormal. Karya-karyanya dikenal memiliki kedalaman emosi yang tulus dan karakterisasi yang kuat.',
        ]);
        Author::create([
            'name' => 'C.S. Lewis',
            'photo' => 'Lewis.png',
            'bio' => 'Penulis Inggris yang terkenal dengan serial fantasi anak-anaknya, The Chronicles of Narnia. Lewis juga dikenal sebagai pembela Kristen yang berpengaruh pada masanya.',
        ]);
        Author::create([
            'name' => 'Agatha Christie',
            'photo' => 'Agatha.png',
            'bio' => 'Penulis misteri legendaris yang sering dijuluki sebagai "Ratu Misteri". Karya-karyanya sering melibatkan detektif Hercule Poirot dan Miss Marple. Beberapa karya terpopulernya adalah Murder on the Orient Express, Crooked House, Death on the Nile, dan And There Was None.',
        ]);
    }
}
