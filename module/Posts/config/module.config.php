<?php
return [
    'service_manager' => [
        'factories' => [
            \Posts\V1\Rest\Post\PostResource::class => \Posts\V1\Rest\Post\PostResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'posts.rest.post' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/post[/:post_id]',
                    'defaults' => [
                        'controller' => 'Posts\\V1\\Rest\\Post\\Controller',
                    ],
                ],
            ],
            'posts.rpc.posts' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/posts',
                    'defaults' => [
                        'controller' => 'Posts\\V1\\Rpc\\Posts\\Controller',
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'posts.rest.post',
            1 => 'posts.rpc.posts',
        ],
    ],
    'api-tools-rest' => [
        'Posts\\V1\\Rest\\Post\\Controller' => [
            'listener' => \Posts\V1\Rest\Post\PostResource::class,
            'route_name' => 'posts.rest.post',
            'route_identifier_name' => 'post_id',
            'collection_name' => 'post',
            'entity_http_methods' => [
                0 => 'PUT',
                1 => 'PATCH',
                2 => 'DELETE',
                3 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'current_page',
                1 => 'size',
                2 => 'title',
            ],
            'page_size' => '25',
            'page_size_param' => 'page_size',
            'entity_class' => \Posts\V1\Rest\Post\PostEntity::class,
            'collection_class' => \Posts\V1\Rest\Post\PostCollection::class,
            'service_name' => 'Post',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Posts\\V1\\Rest\\Post\\Controller' => 'HalJson',
            'Posts\\V1\\Rpc\\Posts\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Posts\\V1\\Rest\\Post\\Controller' => [
                0 => 'application/vnd.posts.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Posts\\V1\\Rpc\\Posts\\Controller' => [
                0 => 'application/vnd.posts.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Posts\\V1\\Rest\\Post\\Controller' => [
                0 => 'application/vnd.posts.v1+json',
                1 => 'application/json',
            ],
            'Posts\\V1\\Rpc\\Posts\\Controller' => [
                0 => 'application/vnd.posts.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \Posts\V1\Rest\Post\PostEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'posts.rest.post',
                'route_identifier_name' => 'post_id',
                'hydrator' => \Laminas\Hydrator\ObjectPropertyHydrator::class,
            ],
            \Posts\V1\Rest\Post\PostCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'posts.rest.post',
                'route_identifier_name' => 'post_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'Posts\\V1\\Rest\\Post\\Controller' => [
            'input_filter' => 'Posts\\V1\\Rest\\Post\\Validator',
        ],
        'Posts\\V1\\Rpc\\Posts\\Controller' => [
            'input_filter' => 'Posts\\V1\\Rpc\\Posts\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Posts\\V1\\Rest\\Post\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                ],
                'name' => 'title',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'max' => '140',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                ],
                'name' => 'body',
            ],
        ],
        'Posts\\V1\\Rpc\\Posts\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                ],
                'name' => 'title',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'max' => '140',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [
                            'charlist' => '',
                        ],
                    ],
                ],
                'name' => 'body',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [
            'Posts\\V1\\Rest\\Post\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Posts\\V1\\Rpc\\Posts\\Controller' => [
                'actions' => [
                    'posts' => [
                        'GET' => true,
                        'POST' => true,
                        'PUT' => true,
                        'PATCH' => true,
                        'DELETE' => true,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Posts\\V1\\Rpc\\Post\\Controller' => 'Posts\\V1\\Rpc\\Post\\PostControllerFactory',
            'Posts\\V1\\Rpc\\Posts\\Controller' => \Posts\V1\Rpc\Posts\PostsControllerFactory::class,
        ],
    ],
    'api-tools-rpc' => [
        'Posts\\V1\\Rpc\\Posts\\Controller' => [
            'service_name' => 'posts',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ],
            'route_name' => 'posts.rpc.posts',
        ],
    ],
];
