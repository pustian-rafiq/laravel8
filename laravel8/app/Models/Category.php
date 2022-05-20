<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_name',
    ];

    public function user(){
        // Category holo child model. tai category theke user model er relation hbe belongsTo
        // ekhane categories.user_id == user.id
        // Eta default use case
        // return $this->belongsTo(User::class,'user_id','id');

        // Category model theke user er hasOne relation korte hoile 2nd parameter a user tabler primary key
        // and 3rd parameter a category tabler foreign key dite hoi
        // user.id == categories.user_id
        // eta custome use case
        return $this->hasOne(User::class, 'id','user_id');

      

    }
}
