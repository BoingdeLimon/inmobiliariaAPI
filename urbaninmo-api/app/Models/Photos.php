<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /** @use HasFactory<\Database\Factories\PhotosFactory> */
    use HasFactory;
    protected $table = 'photos';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'id_real_estate',
        'photo'
    ];
}
