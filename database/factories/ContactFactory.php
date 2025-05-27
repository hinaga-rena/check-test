<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->numerify('0##########'), // ハイフンなし電話番号
            'address' => $this->faker->address(),
            'building' => $this->faker->secondaryAddress(),
            'category' => $this->faker->randomElement([
                '商品の交換について',
                '商品の返品について',
                '商品トラブル',
                'ショップへのお問い合わせ',
                'その他',
            ]),
            'message' => $this->faker->realText(100), // 最大120文字以内
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}