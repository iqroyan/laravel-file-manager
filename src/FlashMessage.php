<?php

namespace Esmaily\FileManager;


class FlashMessage
{
    public function  create($title,$message,$level,$key='notifications')
    {
        return session()->flash($key, [
            'title'   => $title,
            'message' => $message,
            'level'   => $level
        ]);
    }

    public function info($title, $message)
    {
        return $this->create($title,$message,'info');
    }

    public function success($title, $message)
    {
        return $this->create($title,$message,'success');
    }

    public function warning($title, $message)
    {
        return $this->create($title,$message,'warning');
    }

    public function error($title, $message)
    {
        return $this->create($title,$message,'error');
    }
    public function delay($title, $message)
    {
        return $this->create($title,$message,'success','notifications_delay');
    }
    public function delete($title, $message)
    {
        return $this->create($title,$message,'error','notifications_delay');
    }
}