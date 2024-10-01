<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = "tbl_tasks";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','title', 'description', 'completed', 'user_id',
    ] ;
    // Quan hệ Many-to-One: Một Task thuộc về một User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // Quan hệ Many-to-Many: Một Task có nhiều Category
     public function categories()
     {
         return $this->belongsToMany(CategoryModel::class);
     }
}
