<?php

namespace App\FileSystem;

use App\Exception\File\FileCannotBeOpened;
use App\Exception\File\FileCannotBeRead;
use App\Exception\File\FileNotFound;

interface ReaderInterface
{
    /**
     * @throws FileNotFound
     * @throws FileCannotBeOpened
     */
    public function open(string $filename): void;

    public function read(string $filename): string|null;

    public function close(): void;
}