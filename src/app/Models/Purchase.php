<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
   use HasFactory;

   public $timestamps = false;

   protected $fillable = [
      'user_id',
      'offer_id'
   ];

    public function User()
    {
       return $this->hasMany('App\models\User', 'user_id');
    }

    public function Offer()
    {
       return $this->hasMany('App\models\Offer', 'offer_id');
    }
}
