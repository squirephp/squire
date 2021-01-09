<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\MonorepoBuilder\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::DATA_TO_APPEND, [
        'autoload-dev' => [
            'psr-4' => [
                'Squire\Tests\\' => 'tests',
            ],
        ],
        'require-dev' => [
            'orchestra/testbench' => '^6.2',
            'phpunit/phpunit' => '^9.4',
            'symplify/monorepo-builder' => '^9.0',
        ],
    ]);

    $parameters->set(Option::DATA_TO_REMOVE, [
        'minimum-stability' => '*',
    ]);
};