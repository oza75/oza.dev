<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $types = [
        'e-commerce' => "Site E-commerce",
        "annonce" => "Site d'annonce",
        "vitrine" => "Site vitrine",
        "other" => "Autre"
    ];

    public function parsedSiteName(): string
    {
        return static::$types[$this->site_type] ?? "";
    }
}
