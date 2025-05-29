<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // 1. カテゴリを一括登録
        DB::table('categories')->insert([
            ['name' => '商品のお届けについて'],
            ['name' => '商品の交換について'],
            ['name' => '商品トラブル'],
            ['name' => 'ショップへのお問い合わせ'],
            ['name' => 'その他'],
        ]);

        // 2. カテゴリIDをランダムに使ってContactを作成
        $categoryIds = DB::table('categories')->pluck('id');

        Contact::factory()->count(35)->create([
            'category_id' => $categoryIds->random(),
        ]);
    }
}