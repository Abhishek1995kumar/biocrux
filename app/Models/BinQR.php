<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinQR extends Model {
    use HasFactory, SoftDeletes;
    protected $table = 'bin_qr';
    protected $guarded = [];

    public function botlers() {
        return $this->hasMany(Botler::class, 'bottler_id');
    }

    public function machines() { 
        return $this->hasMany(Machine::class, 'machine_id');
    }

    
}
