<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
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
                            'route'    => '[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    /*
                     * login a registrace
                     */
                    'login' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'login',
                            'defaults' => array(
                                'controller' => 'Application\Controller\Index',
                                'action' => 'login',
                            ),
                        ),
                    ),
                    'register' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'registrace',
                            'defaults' => array(
                                'controller' => 'Application\Controller\Index',
                                'action' => 'registrace',
                            ),
                        ),
                    ),
<<<<<<< HEAD
                    /*
                     * admin
                     */
=======
                    'profil' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'profil/',
                            'defaults' => array(
                                'controller' => 'Application\Controller\Profil',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '[:action]/',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                        ),
                    ),
>>>>>>> origin/master
                    'admin' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'admin/',
                            'defaults' => array(
                                'controller' => 'Application\Controller\Admin',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'kategorie' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => 'kategorie/',
                                    'defaults' => array(
                                        'controller' => 'Application\Controller\Admin',
                                        'action' => 'kategorie',
                                    ),
                                ),
                            ),
                            'log' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => 'log/',
                                    'defaults' => array(
                                        'controller' => 'Application\Controller\Admin',
                                        'action' => 'log',
                                    ),
                                ),
                            ),
                            'schvalovani' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => 'schvalovani/',
                                    'defaults' => array(
                                        'controller' => 'Application\Controller\Admin',
                                        'action' => 'schvalovani',
                                    ),
                                ),
                            ),
                            'bannery' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => 'bannery/',
                                    'defaults' => array(
                                        'controller' => 'Application\Controller\Admin',
                                        'action' => 'bannery',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    /*
                     * profil
                     */
                    'profil' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'profil/',
                            'defaults' => array(
                                'controller' => 'Application\Controller\Profil',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'bannery' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => 'bannery/',
                                    'defaults' => array(
                                        'controller' => 'Application\Controller\Profil',
                                        'action' => 'bannery',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
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
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Admin' => 'Application\Controller\AdminController',
            'Application\Controller\Profil' => 'Application\Controller\ProfilController'
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
);
