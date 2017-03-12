<?php

namespace ApiGen\Configuration\Readers;

use ApiGen\Configuration\Readers\Exceptions\FileNotReadableException;
use ApiGen\Configuration\Readers\Exceptions\MissingFileException;

abstract class AbstractFile
{

    /**
     * @var string
     */
    protected $path;


    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->validatePath($path);
        $this->path = $path;
    }


    /**
     * @param string $path
     */
    protected function validatePath($path)
    {
        if (! file_exists($path)) {
            throw new MissingFileException($path . ' could not be found');
        }

        if (! is_readable($path)) {
            throw new FileNotReadableException($path . ' is not readable.');
        }
    }
}
