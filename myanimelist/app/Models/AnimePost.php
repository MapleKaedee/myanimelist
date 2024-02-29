<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AnimePost extends Model implements HasMedia
{
    protected $fillable = ['title', 'synopsis', 'uploadby', 'link', 'date'];
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
}
