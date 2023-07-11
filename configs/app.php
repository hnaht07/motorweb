<?php 
$config['app'] = [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddleware' =>[
        'san-pham' => AuthMiddleware::class,
        'danh-sach-san-pham' => AuthMiddleware::class,
        'chi-tiet-san-pham' => AuthMiddleware::class,
        
    ],
    'globalMiddleware' =>[
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class
    ]
        
];

?>