<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'vehicle_type',
        'license_plate',
        'availability_status',
        'user_id'
    ];

    /**
     * Relationship: A transporter can have many packages.
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
