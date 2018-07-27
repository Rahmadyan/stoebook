<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Thread extends Model
{
    // protected $guarded=[];

   	protected $fillable=['subject','thread','user_id']; //fillable atau field yg boleh kita isi

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() //relasi polymorphic dengan tabel cooment
    {
    	return $this->morphMany(Comment::class, 'commentable')->latest();	
    }
}
