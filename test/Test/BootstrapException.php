<?php

namespace Test;

use Exception;

class BootstrapException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Test\Bootstrap has not been initialized.';

    /**
     * @var integer
     */
    protected $code = 1;

    public function __construct($message = null, $code = null, $previous = null)
    {
        $message = ($message) ?: $this->message;
        $code    = ($code) ?: $this->code;

        parent::__construct($message, $code, $previous);
    }
}
