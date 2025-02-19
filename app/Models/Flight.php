<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "departure",
        "arrival",
        "airship_id",
        "available"
    ];

    public function airship(): BelongsTo
    {
        return $this->belongsTo(Airship::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "flight_user");
    }
}