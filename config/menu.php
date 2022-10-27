<?php 
return [
    [
        'label' => 'Dashboard',
        'route' => 'backend.dashboard',
        'icon' => 'fa-home',
    ],
    [
        'label' => 'Account Manager',
        'route' => 'account.index',
        'icon' => 'fa-user',
        'items' => [  
            [
                'label' => 'List account',
                'route' => 'account.index',
            ]
        ]
    ],
    [
        'label' => 'Category Manager',
        'route' => 'category.index',
        'icon' => 'fa-clipboard-list',
        'items' => [  
            [
                'label' => 'List category',
                'route' => 'category.index',
            ],
            [
                'label' => 'Add category',
                'route' => 'category.create',
            ]
        ]
    ],
    [
        'label' => 'Product Manager',
        'route' => 'product.index',
        'icon' => 'fa-shopping-basket',
        'items' => [  
            [
                'label' => 'List Product',
                'route' => 'product.index',
            ],
            [
                'label' => 'Add Product',
                'route' => 'product.create',
            ]
        ]
    ],
    [
        'label' => 'Banner Manager',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'items' => [  
            [
                'label' => 'List banner',
                'route' => 'banner.index',
            ],
            [
                'label' => 'Add banner',
                'route' => 'banner.create',
            ]
        ]
    ],
    [
        'label' => 'Blog Manager',
        'route' => 'blog.index',
        'icon' => 'fa-file',
        'items' => [  
            [
                'label' => 'List blog',
                'route' => 'blog.index',
            ],
            [
                'label' => 'Add blog',
                'route' => 'blog.create',
            ]
        ]
    ],
    [
        'label' => 'Order Manager',
        'route' => 'order.index',
        'icon' => 'fa-shopping-cart',
        'items' => [  
            [
                'label' => 'List order',
                'route' => 'order.index',
            ],
            [
                'label' => 'Add order',
                'route' => 'order.create',
            ]
        ]
    ],
    [
        'label' => 'Feedback',
        'route' => 'feedback.index',
        'icon' => 'fa-envelope',
        'items' => [  
            [
                'label' => 'List feedback',
                'route' => 'feedback.index',
            ]
          
        ]
    ]
];

