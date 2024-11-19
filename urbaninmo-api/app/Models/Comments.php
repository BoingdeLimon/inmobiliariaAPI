<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /** @use HasFactory<\Database\Factories\CommentsFactory> */
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'comment',
        'rating', 
        'id_real_estate'
    ];
}
