<?php

namespace App\FileSystem;

use App\Exception\File\FileCannotBeOpened;
use App\Exception\File\FileCannotBeRead;
use App\Exception\File\FileNotFound;

class FileReader implements ReaderInterface
{
    private const string READ_MODE = 'r';

    /**
     * @var resource
     */
    private $file;

    /**
     * @inheritDoc
     */
    public function open(string $filename): void
    {
        if (!file_exists($filename)) {
            throw new FileNotFound($filename);
        }

        $this->file = fopen($filename, self::READ_MODE);

        if ($this->file === false) {
            throw new FileCannotBeOpened($filename);
        }
    }

    public function read(string $filename): string|null
    {
        $row = fgets($this->file);
        if ($row === false) {
            $row = null;
        }

        return $row;
    }

    public function close(): void
    {
        fclose($this->file);
    }
}