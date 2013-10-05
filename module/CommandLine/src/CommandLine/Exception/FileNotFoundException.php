<?php
namespace CommandLine\Exception;


use Exception;

class FileNotFoundException extends Exception
{
    public function __construct($path)
    {
        parent::__construct('Neradau failų aplanke "' . $path . '"');
    }
}