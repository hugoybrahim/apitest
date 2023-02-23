<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
            'price',
            'title',
            'preview_image',
            'description',
            'items',
            'season',
    ];

    public function Purchases()
    {
       return $this->hasMany('App\models\Purchase','offer_id');
    }
}
