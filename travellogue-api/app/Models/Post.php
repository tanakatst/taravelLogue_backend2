<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable =[
        'title', 'prefecture','date','place_name','content',
    ];
    protected $guarded =['user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // public function images(){
    //     return $this->hasMany(PostImage::class);
    // }

}
