<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'department',
        'position', 'joined_date', 'status'
    ];

    protected $appends = ['years_of_service', 'is_flagged'];

    public function getYearsOfServiceAttribute(): int
    {
        return Carbon::parse($this->joined_date)->diffInYears(Carbon::now());
    }

    public function getIsFlaggedAttribute(): bool
    {
        return $this->status === 'active' && $this->years_of_service > 5;
    }
}