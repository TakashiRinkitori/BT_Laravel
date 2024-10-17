<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\TaskModel;
use App\Models\ProjectModel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function testTaskBelongsToProject()
    {
        $project = ProjectModel::factory()->create(['name' => 'Project 1']);

        $task = TaskModel::factory()->create([
            'project_id' => $project->id,
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'completed' => false,
        ]);

        $this->assertEquals($project->id, $task->project_id);
    }

    public function testTaskCanBeCreatedWithAttributes()
    {
        $project = ProjectModel::factory()->create();
        $task = TaskModel::factory()->create([
            'project_id' => $project->id,
            'title' => 'Sample Task',
            'description' => 'Sample Description',
            'completed' => false,
        ]);

        $this->assertEquals('Sample Task', $task->title);
        $this->assertEquals('Sample Description', $task->description);
        $this->assertFalse($task->completed);
    }
}
