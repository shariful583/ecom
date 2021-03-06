<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($category){
            $category->slug = Str::slug($category->name,'-');
        });
    }

    public function parent_category(){
        return $this->belongsTo('App\Models\Category'); //__CLASS__
    }

    public function child_category(){
        return $this->hasMany('App\Models\Category');
    }


    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
