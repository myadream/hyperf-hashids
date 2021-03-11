<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Hyperf\Hashids;

use Hyperf\Hashids\Contract\HashidsInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                HashidsInterface::class => HashidsManager::class
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for hyperf/hashids.',
                    'source' => __DIR__ . '/../publish/hashids.php',
                    'destination' => BASE_PATH . '/config/autoload/hashids.php',
                ],
            ],
        ];
    }
}
