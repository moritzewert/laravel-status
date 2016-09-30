<?php


namespace Moritzewert\Status;


use Moritzewert\Status\Traits\Statusable;

class StateManager
{
    public function addState($statusable, $status)
    {
        $statusable->states()->create([
            'id' => $status->id,
            'type' => get_class($status),
            'data' => $this->getData($statusable, $status)
        ]);
    }

    protected function getData($notifiable, Status $notification)
    {
        if (method_exists($notification, 'toDatabase')) {
            $data = $notification->toDatabase($notifiable);

            return is_array($data) ? $data : $data->data;
        } elseif (method_exists($notification, 'toArray')) {
            return $notification->toArray($notifiable);
        }

        throw new RuntimeException(
            'Notification is missing toDatabase / toArray method.'
        );
    }
}