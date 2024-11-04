<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /** @use HasFactory<\Database\Factories\MessagesFactory> */
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'user_id'
    ];
}
