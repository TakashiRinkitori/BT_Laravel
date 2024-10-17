<?php

namespace Database\Factories;

use App\Models\TaskModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskModelFactory extends Factory
{
    protected $model = TaskModel::class;

    public function definition()
    {
        return [
            'project_id' => 1,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'completed' => $this->faker->boolean,
        ];
    }
}
