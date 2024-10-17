<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = "tasks";

    protected $fillable = ['project_id', /*'user_id', */ 'title', 'description', 'completed'];

    public function project()
    {
        return $this->belongsTo(ProjectModel::class);
    }
}
