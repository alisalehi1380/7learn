<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory,Searchable;

    protected $fillable = ['title','content','publishDateTime','status'];

    public function tags()
    {
        return $this->belongsTomany(Tag::class);
    }


    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
