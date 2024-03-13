<?php

namespace kekaadrenalin\imap;

use Throwable;

/**
 * Class Exception
 *
 * @package kekaadrenalin\imap
 */
class Exception extends \Exception
{
    /**
     * @var array|bool
     */
    protected $errors = false;

    /**
     * @var array|bool
     */
    protected $alerts = false;

    /**
     * Exception constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->errors = imap_errors();
        $this->alerts = imap_alerts();
    }

    /**
     * @return array|bool
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return array|bool
     */
    public function getAlerts()
    {
        return $this->alerts;
    }
}
