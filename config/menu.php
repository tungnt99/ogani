<?php 
return [
    [
        'label' => 'Dashboard',
        'route' => 'backend.dashboard',
        'icon' => 'fa-home',
    ],
    [
        'label' => 'Quản lý tài khoản',
        'route' => 'account.index',
        'icon' => 'fa-user',
        'items' => [  
            [
                'label' => 'Dách sách tài khoản',
                'route' => 'account.index',
            ],
            [
                'label' => 'Thêm tài khoản',
                'route' => 'account.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý danh mục',
        'route' => 'category.index',
        'icon' => 'fa-clipboard-list',
        'items' => [  
            [
                'label' => 'Dách sách danh mục',
                'route' => 'category.index',
            ],
            [
                'label' => 'Thêm dách mục',
                'route' => 'category.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý sản phẩm',
        'route' => 'product.index',
        'icon' => 'fa-shopping-basket',
        'items' => [  
            [
                'label' => 'Dách sách sản phẩm',
                'route' => 'product.index',
            ],
            [
                'label' => 'Thêm sản phẩm',
                'route' => 'product.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý ảnh bìa',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'items' => [  
            [
                'label' => 'Dách sách ảnh bìa',
                'route' => 'banner.index',
            ],
            [
                'label' => 'Thêm ảnh bìa',
                'route' => 'banner.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý bài viết',
        'route' => 'blog.index',
        'icon' => 'fa-file',
        'items' => [  
            [
                'label' => 'Dách sách bài viết',
                'route' => 'blog.index',
            ],
            [
                'label' => 'Thêm bài viết',
                'route' => 'blog.create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý đặt hàng',
        'route' => 'order.index',
        'icon' => 'fa-shopping-cart',
        'items' => [  
            [
                'label' => 'Dách sách đặt hàng',
                'route' => 'order.index',
            ]
        ]
    ],
    [
        'label' => 'Phản hồi',
        'route' => 'feedback.index',
        'icon' => 'fa-envelope',
        'items' => [  
            [
                'label' => 'Dách sách phản hồi',
                'route' => 'feedback.index',
            ]
          
        ]
    ]
];

