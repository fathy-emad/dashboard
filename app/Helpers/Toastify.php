<?php

namespace App\Helpers;

class Toastify
{
    public function toast(string $message, array $options = []): void
    {
        $this->push($message, 'toast', $options);
    }

    public function error(string $message, array $options = []): void
    {
        $this->push($message, 'error', $options);
    }

    public function success(string $message, array $options = []): void
    {
        $this->push($message, 'success', $options);
    }

    public function info(string $message, array $options = []): void
    {
        $this->push($message, 'info', $options);
    }

    public function warning(string $message, array $options = []): void
    {
        $this->push($message, 'warning', $options);
    }

    protected function push(string $message, string $type = 'success', array $options = []): void
    {
        session()->push('toastify', compact('message', 'type', 'options'));
    }
}
