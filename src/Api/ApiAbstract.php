<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/10/15
 * Time: 22:00
 */

namespace SwipeLv\Api;
use Guzzle\Http\Client;

/**
 * Class ApiAbstract
 * @package SwipeLv\Api
 */
abstract class ApiAbstract
{
    const PAYMENT_REGISTRATION_URL = 'https://swipe.lv/en/merchant/api/v0.4/invoice/';

    /**
     * @var string
     */
    private $privateKey;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var Client
     */
    protected $guzzle;

    /**
     * @param string $privateKey
     * @param string $publicKey
     */
    public final function __construct($privateKey,$publicKey)
    {
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
        $this->guzzle = new Client;
    }
} 