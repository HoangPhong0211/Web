<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Các trường được phép nhập liệu từ Form Admin
    protected $fillable = [
        'title', 
        'slug', 
        'description', 
        'image', 
        'location', 
        'project_date', 
        'status'
    ];
}