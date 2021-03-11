<?php

namespace LittleSuperman\HyperfHashids\Contract;

use Hashids\HashidsInterface as SupperHashidsInterface;

/**
 * Interface HashidsInterface
 *
 * @package LittleSuperman\HyperfHashids\Contract
 */
interface HashidsInterface extends SupperHashidsInterface
{
    /**
     * set default config
     *
     * @param string $name
     * @return $this
     */
    public function setDefaultConfig(string $name): self;

}