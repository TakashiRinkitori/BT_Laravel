<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\ProjectModel;
use App\Models\TaskModel;

class ProjectModelTest extends TestCase
{
    use RefreshDatabase;

    public function testMethodReturnsExpectedResult()
    {
        $project = ProjectModel::factory()->create([
            'name' => 'Project 1',
            'description' => 'Description for Project 1',
        ]);

        $task1 = TaskModel::factory()->create([
            'project_id' => $project->id,
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'completed' => false,
        ]);

        $task2 = TaskModel::factory()->create([
            'project_id' => $project->id,
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'completed' => true,
        ]);

        $result = $project->tasks;

        // Kiểm tra số lượng task
        $this->assertCount(2, $result);
        // Kiểm tra tiêu đề của các task
        $this->assertEquals('Task 1', $result[0]->title);
        $this->assertEquals('Task 2', $result[1]->title);
        // Kiểm tra trạng thái hoàn thành của các task
        $this->assertFalse($result[0]->completed);
        $this->assertTrue($result[1]->completed);
    }
}
