<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasDefaultScopes;

class Role extends Model {
    use HasFactory;
    use HasDefaultScopes;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'deleteId', 
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'role', 'slug')->where('deleted_at', null);
    } 

}
