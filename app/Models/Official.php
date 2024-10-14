<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'firstname',
        'lastname',
        'position',
        'gender',
        'email',
        'contact_number',
        'term_start',
        'term_end',
        'official_status'
    ];
}
