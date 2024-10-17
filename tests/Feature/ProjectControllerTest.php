<?php

namespace Tests\Feature;

use App\Models\AdminModel;
use App\Models\ProjectModel;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Tạo role cho admin và gán cho admin
        $role = Role::factory()->create(['name' => 'admin', 'guard_name' => 'admin']);
        $this->admin = AdminModel::factory()->create();
        $this->admin->roles()->attach($role->id);
    }

    public function testAdminCanCreateProject()
    {
        $response = $this->actingAs($this->admin)->post(route('projects.store'), [
            'name' => 'New Project',
            'description' => 'Project Description',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('projects', ['name' => 'New Project']);
    }

    public function testAdminCanViewProjects()
    {
        $project = ProjectModel::factory()->create(['name' => 'Existing Project']);

        $response = $this->actingAs($this->admin)->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertSee('Existing Project');
    }

    public function testAdminCanUpdateProject()
    {
        $project = ProjectModel::factory()->create(['name' => 'Old Project']);

        $response = $this->actingAs($this->admin)->put(route('projects.update', $project->id), [
            'name' => 'Updated Project',
            'description' => 'Updated Description',
        ]);

        // Kiểm tra mã trạng thái và dữ liệu trong database
        $response->assertStatus(200);
        $this->assertDatabaseHas('projects', ['name' => 'Updated Project']);
    }

    public function testAdminCanDeleteProject()
    {
        $project = ProjectModel::factory()->create(['name' => 'Project to Delete']);

        $response = $this->actingAs($this->admin)->delete(route('projects.destroy', $project->id));

        $response->assertStatus(200);
        $this->assertDatabaseMissing('projects', ['name' => 'Project to Delete']);
    }
}
