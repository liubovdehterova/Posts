<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function delete()
    {
        Post::where('category_id',$this->id)->update(['category_id' => 0]);

        return parent::delete(); // TODO: Change the autogenerated stub
    }
}