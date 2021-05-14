<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function isAvailable() {
        return Carbon::parse($this->available_at)->isPast();
    }

    public function availableDate() {
        return Carbon::parse($this->available_at)->format('d/m/Y');
    }
}
