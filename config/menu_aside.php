<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Home.svg',
            'page' => '/dashboard',
            'new-tab' => false,
        ],

        // Order Management
        [
            'section' => 'Order Management',
        ],
        [
            'title' => 'Orders',
            'desc' => '',
            'icon' => 'media/svg/icons/Shopping/Cart1.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'All Orders',
                    'page' => 'orders'
                ],
                [
                    'title' => 'New orders',
                    'page' => 'new-orders'
                ],
                [
                    'title' => 'In progress orders',
                    'page' => 'in-progress-orders'
                ],
                [
                    'title' => 'Complete orders',
                    'page' => 'complete-orders'
                ],
            ]
        ],
        [
            'title' => 'Statistics',
            'desc' => '',
            'icon' => 'media/svg/icons/Shopping/Chart-line1.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Daily Stats',
                    'page' => 'statistics/daily'
                ],
                [
                    'title' => 'Weekly Stats',
                    'page' => 'statistics/weekly'
                ],
                [
                    'title' => 'Monthly Stats',
                    'page' => 'statistics/monthly'
                ],
                [
                    'title' => 'Yearly Stats',
                    'page' => 'statistics/yearly'
                ],
            ]
        ],

        //Product Configurator
        [
            'section' => 'Storage Configurator',
        ],
        [
            'title' => 'Storage Configurator',
            'icon' => 'media/svg/icons/Shopping/Gift.svg',
            'bullet' => 'dot',
            'page' => 'storage-configurator-settings',
        ],

        // Inventory
        [
            'section' => 'Inventory',
        ],
        [
            'title' => 'Products',
            'icon' => 'media/svg/icons/Shopping/Gift.svg',
            'bullet' => 'dot',
            'page' => 'products',
        ],
        [
            'title' => 'Product Categories',
            'icon' => 'media/svg/icons/Shopping/Box3.svg',
            'bullet' => 'dot',
            'page' => 'product-categories',
        ],
        [
            'title' => 'Shipping Templates',
            'icon' => 'media/svg/icons/Map/Compass.svg',
            'bullet' => 'dot',
            'page' => 'shipping-templates',
        ],
        [
            'title' => 'Counties',
            'icon' => 'media/svg/icons/Map/Position.svg',
            'bullet' => 'dot',
            'page' => 'counties',
        ],

        // Marketing and PR
        [
            'section' => 'Marketing and PR',
        ],
        [
            'title' => 'Blog',
            'icon' => 'media/svg/icons/Communication/write.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'View all categories',
                    'bullet' => 'dot',
                    'page' => 'blog-categories'
                ],
                [
                    'title' => 'Create New category',
                    'bullet' => 'dot',
                    'page' => 'blog-categories/create'
                ],
                [
                    'title' => 'View all',
                    'bullet' => 'dot',
                    'page' => 'blogs'
                ],
                [
                    'title' => 'Create New',
                    'bullet' => 'dot',
                    'page' => 'blogs/create'
                ],
                [
                    'title' => 'View facebook posts',
                    'bullet' => 'dot',
                    'page' => 'facebook-posts'
                ],
                [
                    'title' => 'View facebook queue',
                    'bullet' => 'dot',
                    'page' => 'facebook-queued-posts'
                ],
                [
                    'title' => 'View campaigns',
                    'bullet' => 'dot',
                    'page' => 'campaigns'
                ],
            ]
        ],
        [
            'title' => 'Site Analytics',
            'icon' => 'media/svg/icons/Shopping/Chart-bar1.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'https://analytics.google.com/analytics/web/'
        ],

        // Features
        [
            'section' => 'CMS',
        ],
        [
            'title' => 'Pages',
            'icon' => 'media/svg/icons/Home/Book-open.svg',
            'bullet' => 'dot',
            'submenu' => [
                [
                    'title' => 'Home Page',
                    'page' => 'home-page'
                ],
                [
                    'title' => 'About Page',
                    'page' => 'about-page'
                ]
            ],
        ],
        [
            'title' => 'Page Components',
            'icon' => 'media/svg/icons/Design/Component.svg',
            'bullet' => 'dot',
            'submenu' => [
                [
                    'title' => 'Parallax modules',
                    'page' => 'parallax'
                ],
                [
                    'title' => 'Clients',
                    'page' => 'clients'
                ]
            ],
        ],


        [
            'section' => 'User Management',
        ],
        [
            'title' => 'Admin Users',
            'icon' => 'media/svg/icons/General/User.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'admin-users'
        ],
        [
            'title' => 'Customers',
            'icon' => 'media/svg/icons/General/User.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'users'
        ],

        [
            'section' => 'Site Management'
        ],
        [
            'title' => 'Contact Form Submissions',
            'icon' => 'media/svg/icons/Home/Mailbox.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'contacts'
        ],
        [
            'title' => 'Faqs',
            'icon' => 'media/svg/icons/Code/Question-circle.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'faqs'
        ],
        [
            'title' => 'Site Configurations',
            'icon' => 'media/svg/icons/General/Settings-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'site-configurations/branding'
        ],
        [
            'title' => 'Activity Log',
            'icon' => 'media/svg/icons/Weather/Storm.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => 'activity-log'
        ],
    ]

];
