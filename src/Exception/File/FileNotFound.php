<?php

namespace App\Exception\File;

class FileNotFound extends \Exception
{
    protected $message = 'File %s not found';

    public function __construct(string $filename)
    {
        parent::__construct(sprintf($this->message, $filename));
    }
}