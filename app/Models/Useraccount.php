<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useraccount extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['firstname', 'lastname', 'email','password','role','status'];
    public function getRoleAttribute($value)
    {
        return ucFirst($value);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=md5($value);
    }
}
