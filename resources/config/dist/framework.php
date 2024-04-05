<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2017 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$routerPath = '%kernel.root_dir%/config/routing.php';
if ($container->hasParameter('kernel.project_dir')) {
    $routerPath = '%kernel.project_dir%/config/routing.php';
}

$config = [
    'secret' => 'test',
    'test' => true,
    'form' => true,
    'validation' => [
        'enabled' => true,
    ],
    'router' => [
        'resource' => $routerPath,
    ],
    'default_locale' => 'en',
    'translator' => [
        'fallback' => 'en',
    ],
    'session' => [
        'storage_factory_id' => 'session.storage.factory.mock_file',
    ],
];

if (class_exists(\Symfony\Component\Validator\Mapping\Loader\AnnotationLoader::class)) {
    // Symfony < 7
    $config['validation']['enable_annotations'] = true;
}

$container->loadFromExtension('framework', $config);

$container->loadFromExtension('twig', [
    'debug' => '%kernel.debug%',
    'strict_variables' => '%kernel.debug%',
]);
