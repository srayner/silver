<?php

namespace Application;

return array(
    
    // Router configuration.
    'router' => array(
        'routes' => array(
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    
    // Service manager configuration.
    'service_manager' => array(
        'invokables' => array(
            'Application\Monarch'  => 'Application\Entity\Monarch',
            'Application\Type'     => 'Application\Entity\Type', 
            'Application\Coin'     => 'Application\Entity\Coin',
            'Application\Grade'    => 'Application\Entity\Grade',
            'Application\Specimen' => 'Application\Entity\Specimen',
            
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'Application\Form\Coin'        => 'Application\Form\CoinFormFactory',
            'Application\Form\Grade'       => 'Application\Form\GradeFormFactory',
            'Application\Form\Monarch'     => 'Application\Form\MonarchFormFactory',
            'Application\Form\Specimen'    => 'Application\Form\SpecimenFormFactory',
            'Application\Form\Type'        => 'Application\Form\TypeFormFactory',
            'Application\Service\Coin'     => 'Application\Service\CoinServiceFactory',
            'Application\Service\Grade'    => 'Application\Service\GradeServiceFactory',
            'Application\Service\Monarch'  => 'Application\Service\MonarchServiceFactory',
            'Application\Service\Specimen' => 'Application\Service\SpecimenServiceFactory',
            'Application\Service\Type'     => 'Application\Service\TypeServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    
    // Controller config.
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
        ),
        'factories' => array(
            'Application\Controller\Coin'     => 'Application\Controller\CoinControllerFactory',
            'Application\Controller\Grade'    => 'Application\Controller\GradeControllerFactory',
            'Application\Controller\Monarch'  => 'Application\Controller\MonarchControllerFactory',
            'Application\Controller\Specimen' => 'Application\Controller\SpecimenControllerFactory',
            'Application\Controller\Type'     => 'Application\Controller\TypeControllerFactory',
        ),
    ),
    
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    
    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
    
);
