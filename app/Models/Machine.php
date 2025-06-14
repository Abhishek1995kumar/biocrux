<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'machine_masters';
    protected $guarded = [];
    
    public function assignedMachines() {
        return $this->hasMany(AssigneMachineToSubBotler::class, 'machine_id', 'id');
    }

    public function getStatusAttribute($value) {
        return $value == 1 ? 'Enable' : 'Disable';
    }

    public function getCreatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    public function getMachineNameAttribute($value) {
        return $value ? $value : 'N/A';
    }

    public function getMachineNameWithIdAttribute() {
        return $this->id . ' - ' . $this->machine_name;
    }

    public function getMachineCodeWithIdAttribute() {
        return $this->id . ' - ' . $this->machine_code;
    }
}
