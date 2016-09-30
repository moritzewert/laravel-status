<?php

namespace Moritzewert\Status;

use Illuminate\Database\Eloquent\Model;

class DatabaseStatus extends Model
{
    public $incrementing = false;

    protected $table = 'states';

    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];

    public function notifiable()
    {
        return $this->morphTo();
    }

    public function newCollection(array $models = [])
    {
        return new DatabaseStatusCollection($models);
    }
}