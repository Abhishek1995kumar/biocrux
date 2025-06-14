<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Botler extends Model {
    use HasFactory,SoftDeletes;
    protected $table = 'bottler_masters';
    protected $guarded = [];
    
    public function subBotlers() {
        return $this->hasMany(SubBotler::class, 'botler_id', 'id');
    }

    public function botlerUsers() {
        return $this->hasMany(User::class, 'botler_id', 'id');
    }

    public function assignedMachineToBotler() {
        return $this->hasMany(AssigneMachineToBotler::class, 'botler_id', 'id');
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
    public function getBotlerNameAttribute($value) {
        return $value ? $value : 'N/A';
    }
    public function getCompanyAttribute($value) {
        return $value ? $value : 'N/A';
    }
    public function getBotlerIdAttribute($value) {
        return $value ? $value : 'N/A';
    }
    public function getBotlerNameWithIdAttribute() {
        return $this->botler_id . ' - ' . $this->botler_name;
    }
    public function getBotlerNameWithCompanyAttribute() {
        return $this->botler_name . ' - ' . $this->company;
    }
    public function getBotlerNameWithCompanyUrlAttribute() {
        return $this->botler_name . ' - ' . $this->company_url;
    }


}
