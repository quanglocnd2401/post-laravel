<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = Category::create(['name' => 'Root']);

        $child1 = Category::create(['name' => 'Child 1', 'parent_id' => $root->id]);
        $child2 = Category::create(['name' => 'Child 2', 'parent_id' => $root->id]);

        $subChild1 = Category::create(['name' => 'Sub Child 1', 'parent_id' => $child1->id]);
        $subChild2 = Category::create(['name' => 'Sub Child 2', 'parent_id' => $child2->id]);
    }
}
