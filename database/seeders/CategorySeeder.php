<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $names = ['Comedia', 'Terror', 'Accion', 'Ciencia ficción', 'Animada'];
    protected $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, corporis nulla cupiditate corrupti voluptatem accusamus itaque est ex laborum dolore ea nihil. Dolore alias ad debitis voluptatibus assumenda maiores nulla!';
    public function run()
    {
        foreach ($this->names as $name) {
            Category::create([
                'name' => $name,
                'description' => $this->text
            ]);
        }
    }
}
