<?php

namespace App\Exception\File;

class FileCannotBeOpened  extends \Exception
{
    protected $message = 'File %s cannot be opened';

    public function __construct(string $filename)
    {
        parent::__construct(sprintf($this->message, $filename));
    }
}