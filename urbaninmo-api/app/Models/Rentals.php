<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    /** @use HasFactory<\Database\Factories\RentalsFactory> */
    use HasFactory;
    protected $table = 'rentals';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'rent_start',
        'rent_end',
        'reason_end'

    ];
}
