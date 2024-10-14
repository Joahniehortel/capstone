<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_file_name',
        'number_copies',
        'preferred_date',
        'request_purpose',
        'request_status',
        'contact_no',
        'user_id',
        'additional_message'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
