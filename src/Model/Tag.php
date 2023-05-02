<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function delete()
    {
        $this->posts()->detach();

        return parent::delete(); // TODO: Change the autogenerated stub
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}