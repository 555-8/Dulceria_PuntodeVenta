<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candy extends Model
{
    protected $fillable = ['name', 'acquisition_cost', 'selling_price', 'units'];

    // Relación uno a muchos con el modelo Sale
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
