<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $timestamps=false;
    protected $fillable=['category_id','name','price','description','image','stocks'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
