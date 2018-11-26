<?php

namespace Esmaily\FileManager;


/**
 * Class FlashMessage
 * @package Esmaily\FileManager
 */
class FlashMessage
{
    /**
     * @param $title
     * @param $message
     * @param $level
     * @param string $key
     */
    public function create($title, $message, $level, $key = 'notifications')
    {
        return session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    /**
     * @param $title
     * @param $message
     */
    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
    }

    /**
     * @param $title
     * @param $message
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * @param $title
     * @param $message
     */
    public function warning($title, $message)
    {
        return $this->create($title, $message, 'warning');
    }

    /**
     * @param $title
     * @param $message
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * @param $title
     * @param $message
     */
    public function delay($title, $message)
    {
        return $this->create($title, $message, 'success', 'notifications_delay');
    }

    /**
     * @param $title
     * @param $message
     */
    public function delete($title, $message)
    {
        return $this->create($title, $message, 'error', 'notifications_delay');
    }
}