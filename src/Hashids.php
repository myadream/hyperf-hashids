<?php

namespace Hyperf\Hashids;

use \Hashids\Hashids as SupperHashids;
use Hyperf\Hashids\Contract\HashidsInterface;
use Hyperf\Utils\ApplicationContext;

/**
 * Class Hashids
 *
 * @package Hyperf\Hashids
 */
abstract class Hashids
{
    /**
     * get hashids driver
     *
     * @param string $name
     * @return HashidsInterface
     */
    public static function getDriver(string $name = 'default'): HashidsInterface
    {
        return ApplicationContext::getContainer()->get(HashidsInterface::class)->setDefaultConfig($name);
    }

    /**
     * get default connection
     *
     * @return HashidsInterface
     */
    public static function getDefaultConnection(): HashidsInterface
    {
        return self::getDriver();
    }

    /**
     * get default connection
     *
     * @param string $name
     * @return HashidsInterface
     */
    public static function setDefaultConnection(string $name): HashidsInterface
    {
        return self::getDriver($name);
    }

    public static function encode(...$numbers): string
    {
        return self::getDriver()->encode(...$numbers);
    }

    public static function decode(string $hash): array
    {
        return self::getDriver()->decode($hash);
    }

    public static function encodeHex(string $str): string
    {
        return self::getDriver()->encodeHex($str);
    }

    public static function decodeHex(string $hash): string
    {
        return self::getDriver()->decodeHex($hash);
    }
}