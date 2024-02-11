<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/category' => [[['_route' => 'app_product_category_index', '_controller' => 'App\\Controller\\ProductCategoryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/category/new' => [[['_route' => 'app_product_category_new', '_controller' => 'App\\Controller\\ProductCategoryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/product' => [[['_route' => 'app_product_index', '_controller' => 'App\\Controller\\ProductController::index'], null, ['GET' => 0], null, true, false, null]],
        '/product/new' => [[['_route' => 'app_product_new', '_controller' => 'App\\Controller\\ProductController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/subcategory' => [[['_route' => 'app_product_sub_category_index', '_controller' => 'App\\Controller\\ProductSubCategoryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/subcategory/new' => [[['_route' => 'app_product_sub_category_new', '_controller' => 'App\\Controller\\ProductSubCategoryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_testing', '_controller' => 'App\\Controller\\TestingController::index'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/category/([^/]++)(?'
                    .'|(*:28)'
                    .'|/edit(*:40)'
                    .'|(*:47)'
                .')'
                .'|/product/([^/]++)(?'
                    .'|(*:75)'
                    .'|/edit(*:87)'
                    .'|(*:94)'
                .')'
                .'|/subcategory/([^/]++)(?'
                    .'|(*:126)'
                    .'|/edit(*:139)'
                    .'|(*:147)'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:173)'
                    .'|/edit(*:186)'
                    .'|(*:194)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:234)'
                    .'|wdt/([^/]++)(*:254)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:300)'
                            .'|router(*:314)'
                            .'|exception(?'
                                .'|(*:334)'
                                .'|\\.css(*:347)'
                            .')'
                        .')'
                        .'|(*:357)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [[['_route' => 'app_product_category_show', '_controller' => 'App\\Controller\\ProductCategoryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        40 => [[['_route' => 'app_product_category_edit', '_controller' => 'App\\Controller\\ProductCategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        47 => [[['_route' => 'app_product_category_delete', '_controller' => 'App\\Controller\\ProductCategoryController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        75 => [[['_route' => 'app_product_show', '_controller' => 'App\\Controller\\ProductController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        87 => [[['_route' => 'app_product_edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        94 => [[['_route' => 'app_product_delete', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        126 => [[['_route' => 'app_product_sub_category_show', '_controller' => 'App\\Controller\\ProductSubCategoryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        139 => [[['_route' => 'app_product_sub_category_edit', '_controller' => 'App\\Controller\\ProductSubCategoryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        147 => [[['_route' => 'app_product_sub_category_delete', '_controller' => 'App\\Controller\\ProductSubCategoryController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        173 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        186 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        194 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        234 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        254 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        300 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        314 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        334 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        347 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        357 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
