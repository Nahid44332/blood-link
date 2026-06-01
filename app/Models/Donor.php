<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'dob',
        'blood_group',
        'phone',
        'weight',
        'district',
        'location',
        'last_donation',
        'email',
    ];
}
