<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    /** @use HasFactory<\Database\Factories\RealEstateFactory> */
    use HasFactory;
    protected $table = 'real_estate';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'size',
        'rooms',
        'bathrooms',
        'type',
        'has_garage',
        'has_garden',
        'has_patio',
        'id_address',
        'price',
        'is_occupied',
        'pdf'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
