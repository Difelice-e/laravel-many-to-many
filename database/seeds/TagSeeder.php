<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['carne','pesce','senza glutine','senza lattosio'];

        foreach($tags as $name) {

            $tag = new Tag();
            $tag->name = $name;
            $tag->slug = Str::slug($name);

            $tag->save();

        }
    }
}
