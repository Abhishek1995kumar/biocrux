<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasDefaultScopes
{
    // Scope for non-deleted records
    public function scopeIsNotDeleted(Builder $query)
    {
        return $query->where('deleted_at', null);
    }

    // Scope for active records (non-deleted and active status)
    public function scopeIsActive(Builder $query)
    {
        return $query->where('deleted_at', null)->where('status', 1);
    }

    // Scope for finding by Id (non deleted and active records)
    public function scopeFindById(Builder $query, $id)
    {
        return $query->where('id', $id)->isNotDeleted()->isActive();
    }
}
