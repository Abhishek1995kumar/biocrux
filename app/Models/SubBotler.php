<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubBotler extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'sub_bottler_master';
    protected $guarded = [];

    public function botler() {
        return $this->belongsTo(Botler::class, 'bottler_id', 'id');
    }

    public function subBotlerUsers() {
        return $this->hasMany(User::class, 'sub_bottler_id', 'id');
    }

    public function assignedMachineToSubBotler() {
        return $this->hasMany(AssigneMachineToSubBotler::class, 'sub_botler_id', 'id');
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
    public function getCompanyLogoAttribute($value) {
        return $value ? asset('storage/' . $value) : asset('images/default.png');
    }
    public function getCompanyUrlAttribute($value) {
        return $value ? $value : '#';
    }
    public function getColorAttribute($value) {
        return $value ? $value : '#000000';
    }
    public function getSubBotlerNameAttribute($value) {
        return $value ? $value : NULL;
    }
    public function getCompanyAttribute($value) {
        return $value ? $value : NULL;
    }
    public function getSubBotlerIdAttribute($value) {
        return $value ? $value : NULL;
    }
}
