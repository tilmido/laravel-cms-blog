<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategroyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat =new Category();
        $cat->name='ithec';
        $cat->save();
        
        $cat =new Category();
        $cat->name='PSY';
        $cat->save();
        
        $cat =new Category();
        $cat->name='CPA';
        $cat->save();
    }
}
