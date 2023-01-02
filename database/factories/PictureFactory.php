<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    protected $model = Picture::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pictureable = $this->pictureable();
        return [
            'file_path' => fake()-> imageUrl(300, 300),
            'pictureable_id' => $pictureable::factory(),
            'pictureable_type' => $pictureable,
        ];
    }

    public function pictureable()
    {
        return $this->faker->randomElement([
            Post::class,
            User::class,
        ]);
    }
}
