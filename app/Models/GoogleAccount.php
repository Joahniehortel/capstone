<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleAccount extends Model
{
    use HasFactory;

    protected $table = 'google_accounts';

    protected $fillable = [
        'email',
        'google_id'
    ];
}
