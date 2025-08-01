<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'short_title',
        'page_heading',
        'slug',
        'meta_description',
        'content',
        'schema',
        'keywords',
        'appearance_type',
        'status',
        'type',
    ];
}
