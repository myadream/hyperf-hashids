<?php

namespace LittleSuperman\HyperfHashids;

use \Hashids\Hashids as SupperHashids;
use Hyperf\Contract\ConfigInterface;
use LittleSuperman\HyperfHashids\Contract\HashidsInterface;

/**
 * Class Hashids
 *
 * @package LittleSuperman\HyperfHashids
 */
class HashidsManager implements HashidsInterface
{
    /**
     * config
     *
     * @var ConfigInterface
     */
    protected ConfigInterface $config;

    /**
     * default array
     *
     * @var array
     */
    protected array $defaultConfig;

    /**
     * hashids
     *
     * @var SupperHashids
     */
    protected SupperHashids $hashids;

    /**
     * HashidsManager constructor.
     *
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * get config name
     *
     * @return string
     */
    public function getConfigName(): string
    {
        return 'hashids';
    }

    /**
     * set default config
     *
     * @param string $name
     * @return $this
     */
    public function setDefaultConfig(string $name = 'default'): HashidsInterface
    {
        if ($name === 'default') {
            $name = $this->config->get("{$this->getConfigName()}.{$name}");
        }

        $this->defaultConfig = array_merge(
            [
                'salt' => '',
                'length' => 0,
                'alphabet' => ''
            ],
            $this->config->get("{$this->getConfigName()}.connections.{$name}") ?? []
        );

        $this->hashids = new SupperHashids(
            $this->defaultConfig['salt'],
            $this->defaultConfig['length'],
            $this->defaultConfig['alphabet'],
        );

        return $this;
    }

    /**
     * Encode parameters to generate a hash.
     *
     * @param mixed $numbers
     *
     * @return string
     */
    public function encode(...$numbers): string
    {
        return $this->hashids->encode(...$numbers);
    }

    /**
     * Decode a hash to the original parameter values.
     *
     * @param string $hash
     *
     * @return array
     */
    public function decode($hash)
    {
        return $this->hashids->decode($hash);
    }

    /**
     * Encode hexadecimal values and generate a hash string.
     *
     * @param string $str
     *
     * @return string
     */
    public function encodeHex($str)
    {
        return $this->hashids->encodeHex($str);
    }

    /**
     * Decode a hexadecimal hash.
     *
     * @param string $hash
     *
     * @return string
     */
    public function decodeHex($hash): string
    {
        return $this->hashids->decodeHex($hash);
    }
}