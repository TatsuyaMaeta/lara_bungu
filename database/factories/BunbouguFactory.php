<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bunbougu>
 */
class BunbouguFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // 参照記事
        // LaravelでFactoryを使ってテストデータを作成する方法！
        // https://codelikes.com/laravel-factory/

        $names = [
            '赤ペン',
            '青ペン',
            '３色ペン',
            'ボールペン',
            'トンボ消しゴム',
            'まとまるくん',
            'HB鉛筆',
            '2B鉛筆',
            '5B鉛筆'
        ];
        $details = [
            '発色のいい水性の赤ペンです',
            '油性の青ペンです',
            '赤、青、黒の３色ペンです',
            '黒のみでマットなボールペンです',
            '定番のしゴムです',
            '消しカスが飛び散らないまとまるくん',
            '普通の鉛筆です',
            '濃いめの鉛筆です',
            'デッサン向きの鉛筆です'
        ];
        $index_number = rand(0, count($names) - 1);

        $name = $names[$index_number];
        $detail = $details[$index_number];

        return [
            "name"          => $name,
            "kakaku"        => $this->faker->numberBetween($min = 50, $max = 999),
            "bunrui"        => $this->faker->numberBetween($min = 1, $max = 3),
            "shosai"        => $detail,
            "created_at"    => date("Y-m-d H:i:s"),
            "updated_at"    => null,
            "user_id"       => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}
