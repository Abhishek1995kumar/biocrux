<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasDefaultScopes;


class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    use HasDefaultScopes;

    protected $guarded = [];
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bottlerusers(){
        return $this->hasOne(Botler::class, 'id', 'bottler_id');
    }

    public function subBottlerUsers(){
        return $this->hasOne(SubBotler::class, 'id', 'sub_bottler_id');
    }

    

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rolee() {
        return $this->hasOne(Role::class, 'slug', 'role');
    }

    public function permissions() {
        return $this->hasMany(Userpermission::class, 'userId', 'id');
    }

    public function isGOPL() {
        return $this->role === 'gopl';
    }

    public function isSuperAdmin() {
        return $this->role === 'super-admin';
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }
}
