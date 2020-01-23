<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(

            array('product' => 'Logo UYP','price' => '100000.00','stock' => '100','description' => '<p>Ya logo</p>','created_at' => \Carbon\Carbon::now())

          );

          Product::insert($products);
    }
}
