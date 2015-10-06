<?php namespace SwipeLv\Api;

use Guzzle\Http\Client;
use SwipeLv\Entities\EntityAbstract;

/**
 * Class ApiAbstract
 * @package SwipeLv\Api
 */
abstract class ApiAbstract
{
    const PAYMENT_REGISTRATION_URL = 'https://swipe.lv/en/merchant/api/v0.4/invoice/';

    const PAYMENT_EXECUTION_URL = 'https://swipe.lv/client/payment_api/';

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

    /**
     * @param string $endpoint
     * @param EntityAbstract $entity
     *
     * @return string
     */
    protected function hash($endpoint, EntityAbstract $entity)
    {
        $endpoint = 'POST '.str_replace('https://swipe.lv/','',$endpoint);
        $timestamp = $this->makeTimestamp();

        $auth = hash_hmac(
            'sha256',
            $timestamp.$endpoint.$entity->toJson(),
            $this->privateKey
        );

        return $this->publicKey.' ,'.$timestamp.','.$auth;
    }

    /**
     * @return string
     */
    protected function makeTimestamp()
    {
        return (string)time();
    }
} 