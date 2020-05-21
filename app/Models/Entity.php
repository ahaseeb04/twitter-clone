<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Tweets\Entities\EntityDatabaseCollection;

class Entity extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @param array $models
     * @return void
     */
    public function newCollection(array $models = [])
    {
        return new EntityDatabaseCollection($models);
    }
}
