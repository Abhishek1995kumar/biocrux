<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssigneMachineToSubBotler extends Model {
    use HasFactory;
    protected $table = 'machine_assign_sub_bottler';
    protected $guarded = [];

    public function subBotler() {
        return $this->belongsTo(SubBotler::class, 'sub_bottler_id', 'id');
    }
    
    public function botler() {
        return $this->hasOne(Botler::class, 'id', 'bottler_id');
    }

    public function machine() {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }

    public function assignedBy() {
        return $this->belongsTo(User::class, 'assigned_by', 'id');
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedBy() {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
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
    
    public function getSubBotlerNameAttribute($value) {
        return $value ? $value : 'N/A';
    }
    
    public function getSubBotlerNameWithIdAttribute() {
        return $this->sub_bottler_id . ' - ' . $this->sub_bottler_name;
    }
    
    public function getSubBotlerNameWithCompanyAttribute() {
        return $this->sub_bottler_name . ' - ' . $this->company;
    }
    
    public function getSubBotlerNameWithCompanyUrlAttribute() {
        return $this->sub_bottler_name . ' - ' . $this->company_url;
    }
    
    public function getMachineNameAttribute($value) {
        return $value ? $value : 'N/A';
    }
    
    public function getMachineNameWithIdAttribute() {
        return $this->machine_id . ' - ' . $this->machine_name;
    }
}
