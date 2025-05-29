<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::factory()->count(35)->create();

        DB::table('categories')->insert([
            ['name' => '商品のお届けについて'],
            ['name' => '商品の交換について'],
            ['name' => '商品トラブル'],
            ['name' => 'ショップへのお問い合わせ'],
            ['name' => 'その他'],
        ]);
    }
}