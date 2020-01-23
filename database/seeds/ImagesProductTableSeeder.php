<?php

use App\Models\ImagesProduct;
use Illuminate\Database\Seeder;

class ImagesProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images_product = array(

            array('product_id' => '1','image' => 'product/FrHKCI0PUXcwmow7e2CrG0345bnopfX7GJwEIrhp.jpeg','created_at' => \Carbon\Carbon::now())
        );
          ImagesProduct::insert($images_product);
    }
}
