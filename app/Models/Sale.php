<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['candy_id', 'units_sold', 'total_revenue'];

    // Relación inversa con el modelo Candy
    public function candy()
    {
        return $this->belongsTo(Candy::class);
    }
}