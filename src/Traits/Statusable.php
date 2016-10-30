<?php

namespace Moritzewert\Status\Traits;

use Moritzewert\Status\DatabaseStatus;
use Moritzewert\Status\StateManager;


trait Statusable
{
    public function states()
    {
        return $this->morphMany(DatabaseStatus::class, 'statusable')
            ->orderBy('created_at', 'desc');
    }

    public function changeState($instance)
    {
        (new StateManager())->addState($this, $instance);
    }


    public function latestState()
    {
        return $this->states()->orderBy('created_at', 'desc')->first();
    }
}
