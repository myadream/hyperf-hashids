<?php

namespace Hyperf\Hashids\Contract;

use Hashids\HashidsInterface as SupperHashidsInterface;

/**
 * Interface HashidsInterface
 *
 * @package Hyperf\Hashids\Contract
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