<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_title',
        'complaint_image',
        'complaint_detail',
        'user_id',
        'date_occured',
        'complaint_address',
        'complaint_status'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
