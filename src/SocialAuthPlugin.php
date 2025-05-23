<?php
declare(strict_types=1);

/**
 * ADmad\SocialAuth plugin.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 */

namespace ADmad\SocialAuth;

use ADmad\SocialAuth\Database\Type\SerializedType;
use Cake\Core\BasePlugin;
use Cake\Core\PluginApplicationInterface;
use Cake\Database\TypeFactory;
use Cake\Routing\RouteBuilder;

class SocialAuthPlugin extends BasePlugin
{
    protected ?string $name = 'SocialAuth';

    /**
     * @var bool
     */
    protected bool $consoleEnabled = false;

    /**
     * @param \Cake\Core\PluginApplicationInterface $app Application instance.
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
        TypeFactory::map('social-auth.serialized', SerializedType::class);
    }

    /**
     * @param \Cake\Routing\RouteBuilder $routes Routes builder instance.
     * @return void
     */
    public function routes(RouteBuilder $routes): void
    {
        $routes->scope(
            '/social-auth',
            ['plugin' => 'ADmad/SocialAuth', 'controller' => 'Auth'],
            function (RouteBuilder $routes): void {
                $routes->connect(
                    '/login/{provider}',
                    ['action' => 'login'],
                    ['pass' => ['provider']],
                );
                $routes->connect(
                    '/callback/{provider}',
                    ['action' => 'callback'],
                    ['pass' => ['provider']],
                );
                $routes->connect(
                    '/callback',
                    ['action' => 'callback'],
                );
            },
        );
    }
}
