<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $id = 0;
        $group_array = [
            '14', '15', '16', '24',
            '25', '26', '39', '40',
            '41', '42', '43', '44',
            '45', '46', '47', '49',
            '50', '51', '52', '53',
            '80', '82'
        ];
        return [
            'user_id'   => $group_array[$id++],
            'group_number'  => NULL
        ];
    }
}
