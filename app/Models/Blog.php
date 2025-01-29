<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Str;

class Blog extends Model
{
    protected $fillable = ['title', 'type', 'category', 'details', 'image', 'tags', 'posted_by', 'user_id', 'status'];

    public static $blogCategory = [
        'Notice' => 'Notice',
        'Announcement' => 'Announcement',
        'Achievement' => 'Achievement',
        'News' => 'News',
        'Activity' => 'Activity',
        'Story' => 'Story',
        'Event' => 'Event',
        'Article' => 'Article',
        'Others' => 'Others',
    ];

    public function url()
    {
        return route('blog.single', [$this->id, Str::slug($this->title, '-')]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with('user');
    }
}
