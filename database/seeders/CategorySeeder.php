<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Category;
        $c->name = 'Coffee';
        $c->save();

        $c = new Category;
        $c->name = 'Science and Technology';
        $c->save();

        $c = new Category;
        $c->name = 'Food';
        $c->save();

        $c = new Category;
        $c->name = 'Lifestyle';
        $c->save();

        $c = new Category;
        $c->name = 'Fasion and Beauty';
        $c->save();

        $c = new Category;
        $c->name = 'Music';
        $c->save();

        $c = new Category;
        $c->name = 'Sport';
        $c->save();

        $c = new Category;
        $c->name = 'News';
        $c->save();

        $c = new Category;
        $c->name = 'Religion';
        $c->save();

        $c = new Category;
        $c->name = 'Politics';
        $c->save();

        $c = new Category;
        $c->name = 'Philiosophy';
        $c->save();

        $c = new Category;
        $c->name = 'Comedy';
        $c->save();

    }
}
