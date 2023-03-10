<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $title
 * @property mixed $description
 * @property mixed $price
 * @property mixed $token
 * @property mixed $location
 * @property mixed $email
 * @property mixed $name
 */
class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'description',
        'location',
        'price',
        'email',
        'token',
        'status'
    ];
}
