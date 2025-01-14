<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transporter_id',
        'sender',
        'receiver',
        'tracking_number',
        'status',
        'description',
        'delivery_date',
    ];

    /**
     * Relationship: A package belongs to a user (owner).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: A package belongs to a transporter.
     */
    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }
}
