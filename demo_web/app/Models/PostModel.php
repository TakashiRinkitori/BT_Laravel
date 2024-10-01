<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'post_id', 'post_title', 'post_image','post_slug','post_desc','post_content','post_status'
    ] ;
    protected $primaryKey = 'post_id';
    protected $table = 'posts';

}
