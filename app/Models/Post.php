<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Chống Mass Assignment: Chỉ cho phép các trường này được nhập dữ liệu
    protected $fillable = [
        'category_id', 
        'author_id', 
        'title', 
        'slug', 
        'excerpt', 
        'content', 
        'featured_image', 
        'views', 
        'status'
    ];

    // Mối quan hệ: Một bài viết thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Mối quan hệ: Một bài viết được viết bởi một người dùng (Admin)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}