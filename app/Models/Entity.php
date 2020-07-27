<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Tweets\Entities\EntityDatabaseCollection;

class Entity extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new EntityDatabaseCollection($models);
    }
}
