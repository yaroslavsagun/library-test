<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 25; $i++) {
            $book = new Book;
            $book->name = $faker->sentence(4);
            $book->save();
            $book->authors()->attach(Author::inRandomOrder()->first()->id);
            $book->publishers()->attach(Publisher::inRandomOrder()->first()->id);

            if (!rand(0, 3)) { # 25% that book will have 2 authors and 2 publishers
                $book->authors()->attach(Author::inRandomOrder()->first()->id);
                $book->publishers()->attach(Publisher::inRandomOrder()->first()->id);
            }
        }
    }
}
