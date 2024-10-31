<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    //
    protected $table = 'donasi';
    protected $fillable = [
        'nama',
        'amount',
        'status',
        'donation_type',
        'email',
        'catatan',
    ];

    protected $casts = [
        'amount' => 'integer',
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
}
