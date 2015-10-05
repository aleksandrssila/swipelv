<?php namespace SwipeLv\Exceptions;

use Exception;

/**
 * Class InvalidFormatException
 *
 * @package SwipeLv\Exceptions
 */
class InvalidFormatException extends Exception
{

    /**
     * Key of invalid format
     *
     * @var string
     */
    protected $invalidKey;

    /**
     * @param string $key
     * @param int $message
     */
    public function __construct($key,$message)
    {
        parent::__construct($message);
        $this->invalidKey = $key;
    }

    /**
     * @return string
     */
    protected function getInvalidKey()
    {
        return $this->invalidKey;
    }
}