<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Note: images are stored on Cloudinary because Heroku does not support file storage
         * 
         */
        Product::create([
            'name' => 'Margherita',
            'description' => 'Margherita: tomato sauce, mozzarella',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063536/pizza/images/margherita_zbaels.jpg',
            'price' => 9.90
        ]);
        Product::create([
            'name' => 'Funghi',
            'description' => 'Funghi: tomato sauce, mozzarella, mushrooms',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063537/pizza/images/funghi_reqags.jpg',
            'price' => 8.50
        ]);
        Product::create([
            'name' => 'Capricciosa',
            'description' => 'Capricciosa: tomato sauce, mozzarella, mushrooms, ham, eggs, artichoke, cocktail sausages, green olives',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063535/pizza/images/capricciosa_y7at8v.jpg',
            'price' => 9.90
        ]);
        Product::create([
            'name' => 'Quattro Stagioni',
            'description' => 'Quattro Stagioni: tomato sauce, mozzarella, ham, black olives, mushrooms, artichoke, peas, salami, eggs',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063539/pizza/images/quattro_s96ywa.jpg',
            'price' => 14.90
        ]);
        Product::create([
            'name' => 'Vegetariana',
            'description' => 'Vegetariana: tomato sauce, mozzarella, mushrooms, onion, (artichoke), sweet corn, green peppers',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063538/pizza/images/vegetariana_xim1dk.jpg',
            'price' => 12.90
        ]);
        Product::create([
            'name' => 'Peperoni',
            'description' => 'Peperoni: tomato sauce, mozzarella, peperoni',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063538/pizza/images/peperoni_gnxsqu.jpg',
            'price' => 13.50
        ]);
        Product::create([
            'name' => 'Napolitana',
            'description' => 'Napolitana: tomato sauce, anchovies, olives, capers',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063536/pizza/images/napolitana_rphwvy.jpg',
            'price' => 13.00
        ]);
        Product::create([
            'name' => 'Calzone',
            'description' => 'Calzone (folded): tomato sauce, mozzarella, mushrooms, ham, eggs',
            'image' => 'https://res.cloudinary.com/dha5cyxn9/image/upload/v1595063544/pizza/images/calzone_jaof7h.jpg',
            'price' => 13.50
        ]);
    }
}
