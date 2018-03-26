<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    // protected $fillable = ['imagePath','title','category_id','description','price','user_id','slug'];
    protected $guarded = ['id'];

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $search){
    	return $query->where('title', 'like', '%'. $search .'%');
    }

}
