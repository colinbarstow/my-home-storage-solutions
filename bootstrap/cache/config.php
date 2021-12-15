<?php return array (
  'activitylog' => 
  array (
    'enabled' => true,
    'delete_records_older_than_days' => 90,
    'default_log_name' => 'default',
    'default_auth_driver' => NULL,
    'subject_returns_soft_deleted_models' => false,
    'activity_model' => 'Spatie\\Activitylog\\Models\\Activity',
    'table_name' => 'activity_log',
    'database_connection' => NULL,
  ),
  'app' => 
  array (
    'name' => 'My Home Storage Solutions',
    'env' => 'local',
    'debug' => true,
    'url' => 'my-home-storage-solutions.test',
    'domain' => 'http://localhost',
    'asset_url' => NULL,
    'admin_subdomain' => 'admin-portal',
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:J9In5KhrcwPTjtj8KwQWsatVwKQJFjhw6J4ixEYTPFI=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'App\\Providers\\FortifyServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Metronic' => 'App\\Classes\\Theme\\Metronic',
      'Menu' => 'App\\Classes\\Theme\\Menu',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'beautymail' => 
  array (
    'colors' => 
    array (
      'highlight' => '#004ca3',
      'button' => '#004cad',
    ),
    'view' => 
    array (
      'senderName' => NULL,
      'reminder' => NULL,
      'unsubscribe' => NULL,
      'address' => NULL,
      'logo' => 
      array (
        'path' => '%PUBLIC%/vendor/beautymail/assets/images/sunny/logo.png',
        'width' => '',
        'height' => '',
      ),
      'twitter' => NULL,
      'facebook' => NULL,
      'flickr' => NULL,
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'useTLS' => true,
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
    ),
    'prefix' => 'my_home_storage_solutions_cache',
  ),
  'charts' => 
  array (
    'global_route_prefix' => 'api/chart',
    'global_middlewares' => 
    array (
      0 => 'web',
    ),
    'global_route_name_prefix' => 'charts',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'solutions',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'solutions',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'solutions',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'solutions',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'my_home_storage_solutions_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/app/public',
        'url' => 'my-home-storage-solutions.test/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
      ),
    ),
    'links' => 
    array (
      '/Users/colinbarstow/repos/my-home-storage-solutions/public/storage' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/app/public',
    ),
  ),
  'fortify-options' => 
  array (
    'two-factor-authentication' => 
    array (
      'confirmPassword' => true,
    ),
  ),
  'fortify' => 
  array (
    'guard' => 'web',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'passwords' => 'users',
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => '/dashboard',
    'prefix' => '',
    'domain' => NULL,
    'limiters' => 
    array (
      'login' => 'login',
      'two-factor' => 'two-factor',
    ),
    'redirects' => 
    array (
      'login' => NULL,
      'logout' => NULL,
      'password-confirmation' => NULL,
      'register' => NULL,
      'email-verification' => NULL,
      'password-reset' => NULL,
    ),
    'features' => 
    array (
      0 => 'registration',
      1 => 'reset-passwords',
      2 => 'update-profile-information',
      3 => 'update-passwords',
      4 => 'two-factor-authentication',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'layout' => 
  array (
    'self' => 
    array (
      'layout' => 'default',
      'rtl' => false,
    ),
    'js' => 
    array (
      'breakpoints' => 
      array (
        'sm' => 576,
        'md' => 768,
        'lg' => 992,
        'xl' => 1200,
        'xxl' => 1200,
      ),
      'colors' => 
      array (
        'theme' => 
        array (
          'base' => 
          array (
            'white' => '#ffffff',
            'primary' => '#6993FF',
            'secondary' => '#E5EAEE',
            'success' => '#1BC5BD',
            'info' => '#8950FC',
            'warning' => '#FFA800',
            'danger' => '#F64E60',
            'light' => '#F3F6F9',
            'dark' => '#212121',
          ),
          'light' => 
          array (
            'white' => '#ffffff',
            'primary' => '#E1E9FF',
            'secondary' => '#ECF0F3',
            'success' => '#C9F7F5',
            'info' => '#EEE5FF',
            'warning' => '#FFF4DE',
            'danger' => '#FFE2E5',
            'light' => '#F3F6F9',
            'dark' => '#D6D6E0',
          ),
          'inverse' => 
          array (
            'white' => '#ffffff',
            'primary' => '#ffffff',
            'secondary' => '#212121',
            'success' => '#ffffff',
            'info' => '#ffffff',
            'warning' => '#ffffff',
            'danger' => '#ffffff',
            'light' => '#464E5F',
            'dark' => '#ffffff',
          ),
        ),
        'gray' => 
        array (
          'gray-100' => '#F3F6F9',
          'gray-200' => '#ECF0F3',
          'gray-300' => '#E5EAEE',
          'gray-400' => '#D6D6E0',
          'gray-500' => '#B5B5C3',
          'gray-600' => '#80808F',
          'gray-700' => '#464E5F',
          'gray-800' => '#1B283F',
          'gray-900' => '#212121',
        ),
      ),
      'font-family' => 'Poppins',
    ),
    'page-loader' => 
    array (
      'type' => '',
    ),
    'header' => 
    array (
      'self' => 
      array (
        'display' => true,
        'width' => 'fluid',
        'theme' => 'light',
        'fixed' => 
        array (
          'desktop' => true,
          'mobile' => true,
        ),
      ),
      'menu' => 
      array (
        'self' => 
        array (
          'display' => true,
          'layout' => 'default',
          'root-arrow' => false,
        ),
        'desktop' => 
        array (
          'arrow' => true,
          'toggle' => 'click',
          'submenu' => 
          array (
            'theme' => 'light',
            'arrow' => true,
          ),
        ),
        'mobile' => 
        array (
          'submenu' => 
          array (
            'theme' => 'dark',
            'accordion' => true,
          ),
        ),
      ),
    ),
    'subheader' => 
    array (
      'display' => true,
      'displayDesc' => true,
      'layout' => 'subheader-v1',
      'fixed' => true,
      'width' => 'fluid',
      'clear' => false,
      'layouts' => 
      array (
        'subheader-v1' => 'Subheader v1',
        'subheader-v2' => 'Subheader v2',
        'subheader-v3' => 'Subheader v3',
        'subheader-v4' => 'Subheader v4',
      ),
      'style' => 'solid',
    ),
    'content' => 
    array (
      'width' => 'fixed',
      'extended' => false,
    ),
    'brand' => 
    array (
      'self' => 
      array (
        'theme' => 'dark',
      ),
    ),
    'aside' => 
    array (
      'self' => 
      array (
        'theme' => 'dark',
        'display' => true,
        'fixed' => true,
        'minimize' => 
        array (
          'toggle' => true,
          'default' => false,
          'hoverable' => true,
        ),
      ),
      'menu' => 
      array (
        'dropdown' => false,
        'scroll' => false,
        'submenu' => 
        array (
          'accordion' => true,
          'dropdown' => 
          array (
            'arrow' => true,
            'hover-timeout' => 500,
          ),
        ),
      ),
    ),
    'footer' => 
    array (
      'width' => 'fluid',
      'fixed' => false,
    ),
    'extras' => 
    array (
      'search' => 
      array (
        'display' => true,
        'layout' => 'dropdown',
        'offcanvas' => 
        array (
          'direction' => 'right',
        ),
      ),
      'notifications' => 
      array (
        'display' => true,
        'layout' => 'dropdown',
        'dropdown' => 
        array (
          'style' => 'dark',
        ),
        'offcanvas' => 
        array (
          'direction' => 'right',
        ),
      ),
      'quick-actions' => 
      array (
        'display' => true,
        'layout' => 'dropdown',
        'dropdown' => 
        array (
          'style' => 'dark',
        ),
        'offcanvas' => 
        array (
          'direction' => 'right',
        ),
      ),
      'user' => 
      array (
        'display' => true,
        'layout' => 'offcanvas',
        'dropdown' => 
        array (
          'style' => 'dark',
        ),
        'offcanvas' => 
        array (
          'direction' => 'right',
        ),
      ),
      'languages' => 
      array (
        'display' => true,
      ),
      'cart' => 
      array (
        'display' => true,
        'dropdown' => 
        array (
          'style' => 'dark',
        ),
      ),
      'quick-panel' => 
      array (
        'display' => true,
        'offcanvas' => 
        array (
          'direction' => 'right',
        ),
      ),
      'chat' => 
      array (
        'display' => true,
      ),
      'toolbar' => 
      array (
        'display' => true,
      ),
      'scrolltop' => 
      array (
        'display' => true,
      ),
    ),
    'resources' => 
    array (
      'favicon' => 'media/img/logo/favicon.ico',
      'fonts' => 
      array (
        'google' => 
        array (
          'families' => 
          array (
            0 => 'Poppins:300,400,500,600,700',
          ),
        ),
      ),
      'css' => 
      array (
        0 => 'plugins/global/plugins.bundle.css',
        1 => 'plugins/custom/prismjs/prismjs.bundle.css',
        2 => 'css/style.bundle.css',
      ),
      'js' => 
      array (
        0 => 'plugins/global/plugins.bundle.js',
        1 => 'plugins/custom/prismjs/prismjs.bundle.js',
        2 => 'js/scripts.bundle.js',
      ),
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'mailgun',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.mailgun.org',
        'port' => '587',
        'encryption' => 'tls',
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'auth_mode' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/Users/colinbarstow/repos/my-home-storage-solutions/resources/views/vendor/mail',
      ),
    ),
  ),
  'menu_aside' => 
  array (
    'items' => 
    array (
      0 => 
      array (
        'title' => 'Dashboard',
        'root' => true,
        'icon' => 'media/svg/icons/Home/Home.svg',
        'page' => '/dashboard',
        'new-tab' => false,
      ),
      1 => 
      array (
        'section' => 'Order Management',
      ),
      2 => 
      array (
        'title' => 'Orders',
        'desc' => '',
        'icon' => 'media/svg/icons/Shopping/Cart1.svg',
        'bullet' => 'dot',
        'root' => true,
        'submenu' => 
        array (
          0 => 
          array (
            'title' => 'All Orders',
            'page' => 'orders',
          ),
          1 => 
          array (
            'title' => 'New orders',
            'page' => 'new-orders',
          ),
          2 => 
          array (
            'title' => 'In progress orders',
            'page' => 'in-progress-orders',
          ),
          3 => 
          array (
            'title' => 'Complete orders',
            'page' => 'complete-orders',
          ),
        ),
      ),
      3 => 
      array (
        'title' => 'Statistics',
        'desc' => '',
        'icon' => 'media/svg/icons/Shopping/Chart-line1.svg',
        'bullet' => 'dot',
        'root' => true,
        'submenu' => 
        array (
          0 => 
          array (
            'title' => 'Daily Stats',
            'page' => 'statistics/daily',
          ),
          1 => 
          array (
            'title' => 'Weekly Stats',
            'page' => 'statistics/weekly',
          ),
          2 => 
          array (
            'title' => 'Monthly Stats',
            'page' => 'statistics/monthly',
          ),
          3 => 
          array (
            'title' => 'Yearly Stats',
            'page' => 'statistics/yearly',
          ),
        ),
      ),
      4 => 
      array (
        'section' => 'Storage Configurator',
      ),
      5 => 
      array (
        'title' => 'Storage Configurator',
        'icon' => 'media/svg/icons/Shopping/Gift.svg',
        'bullet' => 'dot',
        'page' => 'storage-configurator-settings',
      ),
      6 => 
      array (
        'section' => 'Inventory',
      ),
      7 => 
      array (
        'title' => 'Products',
        'icon' => 'media/svg/icons/Shopping/Gift.svg',
        'bullet' => 'dot',
        'page' => 'products',
      ),
      8 => 
      array (
        'title' => 'Product Categories',
        'icon' => 'media/svg/icons/Shopping/Box3.svg',
        'bullet' => 'dot',
        'page' => 'product-categories',
      ),
      9 => 
      array (
        'title' => 'Shipping Templates',
        'icon' => 'media/svg/icons/Map/Compass.svg',
        'bullet' => 'dot',
        'page' => 'shipping-templates',
      ),
      10 => 
      array (
        'title' => 'Counties',
        'icon' => 'media/svg/icons/Map/Position.svg',
        'bullet' => 'dot',
        'page' => 'counties',
      ),
      11 => 
      array (
        'section' => 'Marketing and PR',
      ),
      12 => 
      array (
        'title' => 'Blog',
        'icon' => 'media/svg/icons/Communication/write.svg',
        'bullet' => 'dot',
        'root' => true,
        'submenu' => 
        array (
          0 => 
          array (
            'title' => 'View all categories',
            'bullet' => 'dot',
            'page' => 'blog-categories',
          ),
          1 => 
          array (
            'title' => 'Create New category',
            'bullet' => 'dot',
            'page' => 'blog-categories/create',
          ),
          2 => 
          array (
            'title' => 'View all',
            'bullet' => 'dot',
            'page' => 'blogs',
          ),
          3 => 
          array (
            'title' => 'Create New',
            'bullet' => 'dot',
            'page' => 'blogs/create',
          ),
          4 => 
          array (
            'title' => 'View facebook posts',
            'bullet' => 'dot',
            'page' => 'facebook-posts',
          ),
          5 => 
          array (
            'title' => 'View facebook queue',
            'bullet' => 'dot',
            'page' => 'facebook-queued-posts',
          ),
          6 => 
          array (
            'title' => 'View campaigns',
            'bullet' => 'dot',
            'page' => 'campaigns',
          ),
        ),
      ),
      13 => 
      array (
        'title' => 'Site Analytics',
        'icon' => 'media/svg/icons/Shopping/Chart-bar1.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'https://analytics.google.com/analytics/web/',
      ),
      14 => 
      array (
        'section' => 'CMS',
      ),
      15 => 
      array (
        'title' => 'Pages',
        'icon' => 'media/svg/icons/Home/Book-open.svg',
        'bullet' => 'dot',
        'submenu' => 
        array (
          0 => 
          array (
            'title' => 'Home Page',
            'page' => 'home-page',
          ),
          1 => 
          array (
            'title' => 'About Page',
            'page' => 'about-page',
          ),
        ),
      ),
      16 => 
      array (
        'title' => 'Page Components',
        'icon' => 'media/svg/icons/Design/Component.svg',
        'bullet' => 'dot',
        'submenu' => 
        array (
          0 => 
          array (
            'title' => 'Parallax modules',
            'page' => 'parallax',
          ),
          1 => 
          array (
            'title' => 'Clients',
            'page' => 'clients',
          ),
        ),
      ),
      17 => 
      array (
        'section' => 'User Management',
      ),
      18 => 
      array (
        'title' => 'Admin Users',
        'icon' => 'media/svg/icons/General/User.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'admin-users',
      ),
      19 => 
      array (
        'title' => 'Customers',
        'icon' => 'media/svg/icons/General/User.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'users',
      ),
      20 => 
      array (
        'section' => 'Site Management',
      ),
      21 => 
      array (
        'title' => 'Contact Form Submissions',
        'icon' => 'media/svg/icons/Home/Mailbox.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'contacts',
      ),
      22 => 
      array (
        'title' => 'Faqs',
        'icon' => 'media/svg/icons/Code/Question-circle.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'faqs',
      ),
      23 => 
      array (
        'title' => 'Site Configurations',
        'icon' => 'media/svg/icons/General/Settings-2.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'site-configurations/branding',
      ),
      24 => 
      array (
        'title' => 'Activity Log',
        'icon' => 'media/svg/icons/Weather/Storm.svg',
        'bullet' => 'dot',
        'root' => true,
        'page' => 'activity-log',
      ),
    ),
  ),
  'menu_header' => 
  array (
    'items' => 
    array (
      0 => 
      array (
      ),
      1 => 
      array (
        'title' => 'Dashboard',
        'root' => true,
        'page' => '/',
        'new-tab' => false,
      ),
      2 => 
      array (
        'title' => 'Features',
        'root' => true,
        'toggle' => 'click',
        'submenu' => 
        array (
          'type' => 'classic',
          'alignment' => 'left',
          'items' => 
          array (
            0 => 
            array (
              'title' => 'Bootstrap',
              'desc' => '',
              'icon' => 'media/svg/icons/Communication/Add-user.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Utilities',
                  'page' => 'features/bootstrap/utilities',
                ),
                1 => 
                array (
                  'title' => 'Typography',
                  'page' => 'features/bootstrap/typography',
                ),
                2 => 
                array (
                  'title' => 'Buttons',
                  'page' => 'features/bootstrap/buttons',
                ),
                3 => 
                array (
                  'title' => 'Button Group',
                  'page' => 'features/bootstrap/button-group',
                ),
                4 => 
                array (
                  'title' => 'Dropdown',
                  'page' => 'features/bootstrap/dropdown',
                ),
                5 => 
                array (
                  'title' => 'Navs',
                  'page' => 'features/bootstrap/navs',
                ),
                6 => 
                array (
                  'title' => 'Tables',
                  'page' => 'features/bootstrap/tables',
                ),
                7 => 
                array (
                  'title' => 'Progress',
                  'page' => 'features/bootstrap/progress',
                ),
                8 => 
                array (
                  'title' => 'Modal',
                  'page' => 'features/bootstrap/modal',
                ),
                9 => 
                array (
                  'title' => 'Alerts',
                  'page' => 'features/bootstrap/alerts',
                ),
                10 => 
                array (
                  'title' => 'Popover',
                  'page' => 'features/bootstrap/popover',
                ),
                11 => 
                array (
                  'title' => 'Tooltip',
                  'page' => 'features/bootstrap/tooltip',
                ),
              ),
            ),
            1 => 
            array (
              'title' => 'Custom',
              'desc' => '',
              'icon' => 'media/svg/icons/Files/Pictures1.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Utilities',
                  'page' => 'features/custom/utilities',
                ),
                1 => 
                array (
                  'title' => 'Accordions',
                  'page' => 'features/custom/accordions',
                ),
                2 => 
                array (
                  'title' => 'Label',
                  'page' => 'features/custom/labels',
                ),
                3 => 
                array (
                  'title' => 'Line Tabs',
                  'page' => 'features/custom/line-tabs',
                ),
                4 => 
                array (
                  'title' => 'Advance Navigations',
                  'page' => 'features/custom/advance-navs',
                ),
                5 => 
                array (
                  'title' => 'Timeline',
                  'page' => 'features/custom/timeline',
                ),
                6 => 
                array (
                  'title' => 'Pagination',
                  'page' => 'features/custom/pagination',
                ),
                7 => 
                array (
                  'title' => 'Media',
                  'page' => 'features/custom/media',
                ),
                8 => 
                array (
                  'title' => 'Spinners',
                  'page' => 'features/custom/spinners',
                ),
                9 => 
                array (
                  'title' => 'Iconbox',
                  'page' => 'features/custom/iconbox',
                ),
                10 => 
                array (
                  'title' => 'Callout',
                  'page' => 'features/custom/callout',
                ),
                11 => 
                array (
                  'title' => 'Ribbons',
                  'page' => 'features/custom/ribbons',
                ),
              ),
            ),
            2 => 
            array (
              'title' => 'Icons',
              'desc' => '',
              'icon' => 'media/svg/icons/Communication/Address-card.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Flaticon',
                  'page' => 'features/icons/flaticon',
                ),
                1 => 
                array (
                  'title' => 'Fontawesome 5',
                  'page' => 'features/icons/fontawesome5',
                ),
                2 => 
                array (
                  'title' => 'Lineawesome',
                  'page' => 'features/icons/lineawesome',
                ),
                3 => 
                array (
                  'title' => 'Socicons',
                  'page' => 'features/icons/socicons',
                ),
                4 => 
                array (
                  'title' => 'SVG Icons',
                  'page' => 'features/svg/icons',
                ),
              ),
            ),
            3 => 
            array (
              'title' => 'Cards',
              'desc' => '',
              'icon' => 'media/svg/icons/Communication/Adress-book2.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'General Cards',
                  'page' => 'features/cards/general',
                ),
                1 => 
                array (
                  'title' => 'Stacked Cards',
                  'page' => 'features/cards/stacked',
                ),
                2 => 
                array (
                  'title' => 'Tabbed Cards',
                  'page' => 'features/cards/tabbed',
                ),
                3 => 
                array (
                  'title' => 'Draggable Cards',
                  'page' => 'features/cards/draggable',
                ),
                4 => 
                array (
                  'title' => 'Cards Tools',
                  'page' => 'features/cards/tools',
                ),
                5 => 
                array (
                  'title' => 'Sticky Cards',
                  'page' => 'features/cards/sticky',
                ),
                6 => 
                array (
                  'title' => 'Stretched Cards',
                  'page' => 'features/cards/stretched',
                ),
              ),
            ),
            4 => 
            array (
              'title' => 'Widgets',
              'desc' => 'dashboard widget examples',
              'icon' => 'media/svg/icons/Communication/Chat1.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Lists',
                  'page' => 'features/widgets/lists',
                ),
                1 => 
                array (
                  'title' => 'Stats',
                  'page' => 'features/widgets/stats',
                ),
                2 => 
                array (
                  'title' => 'Charts',
                  'page' => 'features/widgets/charts',
                ),
                3 => 
                array (
                  'title' => 'Charts',
                  'page' => 'features/widgets/charts',
                ),
                4 => 
                array (
                  'title' => 'Mixed',
                  'page' => 'features/widgets/mixed',
                ),
                5 => 
                array (
                  'title' => 'Tiles',
                  'page' => 'features/widgets/tiles',
                ),
                6 => 
                array (
                  'title' => 'Engage',
                  'page' => 'features/widgets/engage',
                ),
                7 => 
                array (
                  'title' => 'Tables',
                  'page' => 'features/widgets/tables',
                ),
                8 => 
                array (
                  'title' => 'Forms',
                  'page' => 'features/widgets/forms',
                ),
              ),
            ),
            5 => 
            array (
              'title' => 'Calendar',
              'desc' => '',
              'icon' => 'media/svg/icons/Communication/Chat-check.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Basic Calendar',
                  'page' => 'features/calendar/basic',
                ),
                1 => 
                array (
                  'title' => 'List Views',
                  'page' => 'features/calendar/list-view',
                ),
                2 => 
                array (
                  'title' => 'Google Calendar',
                  'page' => 'features/calendar/google',
                ),
                3 => 
                array (
                  'title' => 'External Events',
                  'page' => 'features/calendar/external-events',
                ),
                4 => 
                array (
                  'title' => 'Background Events',
                  'page' => 'features/calendar/background-events',
                ),
              ),
            ),
            6 => 
            array (
              'title' => 'Charts',
              'icon' => 'media/svg/icons/Communication/Dial-numbers.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'amCharts',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'amCharts Charts',
                      'page' => 'features/charts/amcharts/charts',
                    ),
                    1 => 
                    array (
                      'title' => 'amCharts Stock Charts',
                      'page' => 'features/charts/amcharts/stock-charts',
                    ),
                    2 => 
                    array (
                      'title' => 'amCharts Maps',
                      'page' => 'features/charts/amcharts/maps',
                    ),
                  ),
                ),
                1 => 
                array (
                  'title' => 'Flot Charts',
                  'page' => 'features/charts/flotcharts',
                ),
                2 => 
                array (
                  'title' => 'Google Charts',
                  'page' => 'features/charts/google-charts',
                ),
                3 => 
                array (
                  'title' => 'Morris Charts',
                  'page' => 'features/charts/morris-charts',
                ),
              ),
            ),
            7 => 
            array (
              'title' => 'Maps',
              'icon' => 'media/svg/icons/Communication/Incoming-box.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Google Maps',
                  'page' => 'features/maps/google-maps',
                ),
                1 => 
                array (
                  'title' => 'JQVMap',
                  'page' => 'features/maps/jqvmap',
                ),
              ),
            ),
            8 => 
            array (
              'title' => 'Miscellaneous',
              'desc' => '',
              'icon' => 'media/svg/icons/Communication/Active-call.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Kanban Board',
                  'page' => 'features/miscellaneous/kanban-board',
                ),
                1 => 
                array (
                  'title' => 'Sticky Panels',
                  'page' => 'features/miscellaneous/sticky-panels',
                ),
                2 => 
                array (
                  'title' => 'Block UI',
                  'page' => 'features/miscellaneous/blockui',
                ),
                3 => 
                array (
                  'title' => 'Perfect Scrollbar',
                  'page' => 'features/miscellaneous/perfect-scrollbar',
                ),
                4 => 
                array (
                  'title' => 'Tree View',
                  'page' => 'features/miscellaneous/treeview',
                ),
                5 => 
                array (
                  'title' => 'Bootstrap Notify',
                  'page' => 'features/miscellaneous/bootstrap-notify',
                ),
                6 => 
                array (
                  'title' => 'Toastr',
                  'page' => 'features/miscellaneous/toastr',
                ),
                7 => 
                array (
                  'title' => 'SweetAlert2',
                  'page' => 'features/miscellaneous/sweetalert2',
                ),
                8 => 
                array (
                  'title' => 'Dual Listbox',
                  'page' => 'features/miscellaneous/dual-listbox',
                ),
                9 => 
                array (
                  'title' => 'Session Timeout',
                  'page' => 'features/miscellaneous/session-timeout',
                ),
                10 => 
                array (
                  'title' => 'Idle Timer',
                  'page' => 'features/miscellaneous/idle-timer',
                ),
              ),
            ),
          ),
        ),
      ),
      3 => 
      array (
        'title' => 'Crud',
        'root' => true,
        'toggle' => 'click',
        'submenu' => 
        array (
          'type' => 'classic',
          'alignment' => 'left',
          'items' => 
          array (
            0 => 
            array (
              'title' => 'Forms & Controls',
              'desc' => 'Massive crud examples',
              'icon' => 'media/svg/icons/Shopping/Box2.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Form Controls',
                  'desc' => '',
                  'icon' => 'flaticon-interface-3',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Base Inputs',
                      'page' => 'crud/forms/controls/base',
                    ),
                    1 => 
                    array (
                      'title' => 'Input Groups',
                      'page' => 'crud/forms/controls/input-group',
                    ),
                    2 => 
                    array (
                      'title' => 'Checkbox',
                      'page' => 'crud/forms/controls/checkbox',
                    ),
                    3 => 
                    array (
                      'title' => 'Radio',
                      'page' => 'crud/forms/controls/radio',
                    ),
                    4 => 
                    array (
                      'title' => 'Switch',
                      'page' => 'crud/forms/controls/switch',
                    ),
                    5 => 
                    array (
                      'title' => 'Mega Options',
                      'page' => 'crud/forms/controls/option',
                    ),
                  ),
                ),
                1 => 
                array (
                  'title' => 'Form Widgets',
                  'desc' => '',
                  'icon' => 'flaticon-interface-1',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Datepicker',
                      'page' => 'crud/forms/widgets/bootstrap-datepicker',
                    ),
                    1 => 
                    array (
                      'title' => 'Datetimepicker',
                      'page' => 'crud/forms/widgets/bootstrap-datetimepicker',
                    ),
                    2 => 
                    array (
                      'title' => 'Timepicker',
                      'page' => 'crud/forms/widgets/bootstrap-timepicker',
                    ),
                    3 => 
                    array (
                      'title' => 'Daterangepicker',
                      'page' => 'crud/forms/widgets/bootstrap-daterangepicker',
                    ),
                    4 => 
                    array (
                      'title' => 'Tagify',
                      'page' => 'crud/forms/widgets/tagify',
                    ),
                    5 => 
                    array (
                      'title' => 'Touchspin',
                      'page' => 'crud/forms/widgets/bootstrap-touchspin',
                    ),
                    6 => 
                    array (
                      'title' => 'Maxlength',
                      'page' => 'crud/forms/widgets/bootstrap-maxlength',
                    ),
                    7 => 
                    array (
                      'title' => 'Switch',
                      'page' => 'crud/forms/widgets/bootstrap-switch',
                    ),
                    8 => 
                    array (
                      'title' => 'Multiple Select Splitter',
                      'page' => 'crud/forms/widgets/bootstrap-multipleselectsplitter',
                    ),
                    9 => 
                    array (
                      'title' => 'Bootstrap Select',
                      'page' => 'crud/forms/widgets/bootstrap-select',
                    ),
                    10 => 
                    array (
                      'title' => 'Select2',
                      'page' => 'crud/forms/widgets/select2',
                    ),
                    11 => 
                    array (
                      'title' => 'Typeahead',
                      'page' => 'crud/forms/widgets/typeahead',
                    ),
                  ),
                ),
                2 => 
                array (
                  'title' => 'Form Widgets 2',
                  'desc' => '',
                  'icon' => 'flaticon-interface-1',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'noUiSlider',
                      'page' => 'crud/forms/widgets/nouislider',
                    ),
                    1 => 
                    array (
                      'title' => 'Form Repeater',
                      'page' => 'crud/forms/widgets/form-repeater',
                    ),
                    2 => 
                    array (
                      'title' => 'Ion Range Slider',
                      'page' => 'crud/forms/widgets/ion-range-slider',
                    ),
                    3 => 
                    array (
                      'title' => 'Input Masks',
                      'page' => 'crud/forms/widgets/input-mask',
                    ),
                    4 => 
                    array (
                      'title' => 'Autosize',
                      'page' => 'crud/forms/widgets/autosize',
                    ),
                    5 => 
                    array (
                      'title' => 'Clipboard',
                      'page' => 'crud/forms/widgets/clipboard',
                    ),
                    6 => 
                    array (
                      'title' => 'Google reCaptcha',
                      'page' => 'crud/forms/widgets/recaptcha',
                    ),
                  ),
                ),
                3 => 
                array (
                  'title' => 'Form Text Editors',
                  'desc' => '',
                  'icon' => 'flaticon-interface-1',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'TinyMCE',
                      'page' => 'crud/forms/editors/tinymce',
                    ),
                    1 => 
                    array (
                      'title' => 'CKEditor',
                      'bullet' => 'line',
                      'submenu' => 
                      array (
                        0 => 
                        array (
                          'title' => 'CKEditor Classic',
                          'page' => 'crud/forms/editors/ckeditor-classic',
                        ),
                        1 => 
                        array (
                          'title' => 'CKEditor Inline',
                          'page' => 'crud/forms/editors/ckeditor-inline',
                        ),
                        2 => 
                        array (
                          'title' => 'CKEditor Balloon',
                          'page' => 'crud/forms/editors/ckeditor-balloon',
                        ),
                        3 => 
                        array (
                          'title' => 'CKEditor Balloon Block',
                          'page' => 'crud/forms/editors/ckeditor-balloon-block',
                        ),
                        4 => 
                        array (
                          'title' => 'CKEditor Document',
                          'page' => 'crud/forms/editors/ckeditor-document',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'title' => 'Quill Text Editor',
                      'page' => 'crud/forms/editors/quill',
                    ),
                    3 => 
                    array (
                      'title' => 'Summernote WYSIWYG',
                      'page' => 'crud/forms/editors/summernote',
                    ),
                    4 => 
                    array (
                      'title' => 'Markdown Editor',
                      'page' => 'crud/forms/editors/bootstrap-markdown',
                    ),
                  ),
                ),
                4 => 
                array (
                  'title' => 'Form Layouts',
                  'desc' => '',
                  'icon' => 'flaticon-web',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Default Forms',
                      'page' => 'crud/forms/layouts/default-forms',
                    ),
                    1 => 
                    array (
                      'title' => 'Multi Column Forms',
                      'page' => 'crud/forms/layouts/multi-column-forms',
                    ),
                    2 => 
                    array (
                      'title' => 'Basic Action Bars',
                      'page' => 'crud/forms/layouts/action-bars',
                    ),
                    3 => 
                    array (
                      'title' => 'Sticky Action Bar',
                      'page' => 'crud/forms/layouts/sticky-action-bar',
                    ),
                  ),
                ),
                5 => 
                array (
                  'title' => 'Form Validation',
                  'desc' => '',
                  'icon' => 'flaticon-calendar-2',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Validation States',
                      'page' => 'crud/forms/validation/states',
                    ),
                    1 => 
                    array (
                      'title' => 'Form Controls',
                      'page' => 'crud/forms/validation/form-controls',
                    ),
                    2 => 
                    array (
                      'title' => 'Form Widgets',
                      'page' => 'crud/forms/validation/form-widgets',
                    ),
                  ),
                ),
              ),
            ),
            1 => 
            array (
              'title' => 'KTDatatable',
              'desc' => '',
              'icon' => 'media/svg/icons/General/Thunder-move.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Base',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Local Data',
                      'page' => 'crud/ktdatatable/base/data-local',
                      'icon' => '',
                    ),
                    1 => 
                    array (
                      'title' => 'JSON Data',
                      'page' => 'crud/ktdatatable/base/data-json',
                      'icon' => '',
                    ),
                    2 => 
                    array (
                      'title' => 'Ajax Data',
                      'page' => 'crud/ktdatatable/base/data-ajax',
                      'icon' => '',
                    ),
                    3 => 
                    array (
                      'title' => 'HTML Table',
                      'page' => 'crud/ktdatatable/base/html-table',
                      'icon' => '',
                    ),
                    4 => 
                    array (
                      'title' => 'Local Sort',
                      'page' => 'crud/ktdatatable/base/local-sort',
                      'icon' => '',
                    ),
                    5 => 
                    array (
                      'title' => 'Translation',
                      'page' => 'crud/ktdatatable/base/translation',
                      'icon' => '',
                    ),
                  ),
                ),
                1 => 
                array (
                  'title' => 'Advanced',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Record Selection',
                      'page' => 'crud/ktdatatable/advanced/record-selection',
                      'icon' => '',
                    ),
                    1 => 
                    array (
                      'title' => 'Row Details',
                      'page' => 'crud/ktdatatable/advanced/row-details',
                      'icon' => '',
                    ),
                    2 => 
                    array (
                      'title' => 'Modal Examples',
                      'page' => 'crud/ktdatatable/advanced/modal',
                      'icon' => '',
                    ),
                    3 => 
                    array (
                      'title' => 'Column Rendering',
                      'page' => 'crud/ktdatatable/advanced/column-rendering',
                      'icon' => '',
                    ),
                    4 => 
                    array (
                      'title' => 'Column Width',
                      'page' => 'crud/ktdatatable/advanced/column-width',
                      'icon' => '',
                    ),
                    5 => 
                    array (
                      'title' => 'Vertical Scrolling',
                      'page' => 'crud/ktdatatable/advanced/vertical',
                      'icon' => '',
                    ),
                  ),
                ),
                2 => 
                array (
                  'title' => 'Child Datatables',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Local Data',
                      'page' => 'crud/ktdatatable/child/data-local',
                      'icon' => '',
                    ),
                    1 => 
                    array (
                      'title' => 'Remote Data',
                      'page' => 'crud/ktdatatable/child/data-ajax',
                      'icon' => '',
                    ),
                  ),
                ),
                3 => 
                array (
                  'title' => 'API',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'API Methods',
                      'page' => 'crud/ktdatatable/api/methods',
                      'icon' => '',
                    ),
                    1 => 
                    array (
                      'title' => 'Events',
                      'page' => 'crud/ktdatatable/api/events',
                      'icon' => '',
                    ),
                  ),
                ),
              ),
            ),
            2 => 
            array (
              'title' => 'Datatables.net',
              'desc' => '',
              'icon' => 'media/svg/icons/Shopping/Gift.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Basic',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Basic Tables',
                      'page' => 'crud/datatables/basic/basic',
                    ),
                    1 => 
                    array (
                      'title' => 'Scrollable Tables',
                      'page' => 'crud/datatables/basic/scrollable',
                    ),
                    2 => 
                    array (
                      'title' => 'Complex Headers',
                      'page' => 'crud/datatables/basic/headers',
                    ),
                    3 => 
                    array (
                      'title' => 'Pagination Options',
                      'page' => 'crud/datatables/basic/paginations',
                    ),
                  ),
                ),
                1 => 
                array (
                  'title' => 'Advanced',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Column Rendering',
                      'page' => 'crud/datatables/advanced/column-rendering',
                    ),
                    1 => 
                    array (
                      'title' => 'Multiple Controls',
                      'page' => 'crud/datatables/advanced/multiple-controls',
                    ),
                    2 => 
                    array (
                      'title' => 'Column Visibility',
                      'page' => 'crud/datatables/advanced/column-visibility',
                    ),
                    3 => 
                    array (
                      'title' => 'Row Callback',
                      'page' => 'crud/datatables/advanced/row-callback',
                    ),
                    4 => 
                    array (
                      'title' => 'Row Grouping',
                      'page' => 'crud/datatables/advanced/row-grouping',
                    ),
                    5 => 
                    array (
                      'title' => 'Footer Callback',
                      'page' => 'crud/datatables/advanced/footer-callback',
                    ),
                  ),
                ),
                2 => 
                array (
                  'title' => 'Data sources',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'HTML',
                      'page' => 'crud/datatables/data-sources/html',
                    ),
                    1 => 
                    array (
                      'title' => 'Javascript',
                      'page' => 'crud/datatables/data-sources/javascript',
                    ),
                    2 => 
                    array (
                      'title' => 'Ajax Client-side',
                      'page' => 'crud/datatables/data-sources/ajax-client-side',
                    ),
                    3 => 
                    array (
                      'title' => 'Ajax Server-side',
                      'page' => 'crud/datatables/data-sources/ajax-server-side',
                    ),
                  ),
                ),
                3 => 
                array (
                  'title' => 'Search Options',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Column Search',
                      'page' => 'crud/datatables/search-options/column-search',
                    ),
                    1 => 
                    array (
                      'title' => 'Advanced Search',
                      'page' => 'crud/datatables/search-options/advanced-search',
                    ),
                  ),
                ),
                4 => 
                array (
                  'title' => 'Extensions',
                  'desc' => '',
                  'bullet' => 'dot',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Buttons',
                      'page' => 'crud/datatables/extensions/buttons',
                    ),
                    1 => 
                    array (
                      'title' => 'ColReorder',
                      'page' => 'crud/datatables/extensions/colreorder',
                    ),
                    2 => 
                    array (
                      'title' => 'KeyTable',
                      'page' => 'crud/datatables/extensions/keytable',
                    ),
                    3 => 
                    array (
                      'title' => 'Responsive',
                      'page' => 'crud/datatables/extensions/responsive',
                    ),
                    4 => 
                    array (
                      'title' => 'RowGroup',
                      'page' => 'crud/datatables/extensions/rowgroup',
                    ),
                    5 => 
                    array (
                      'title' => 'RowReorder',
                      'page' => 'crud/datatables/extensions/rowreorder',
                    ),
                    6 => 
                    array (
                      'title' => 'Scroller',
                      'page' => 'crud/datatables/extensions/scroller',
                    ),
                    7 => 
                    array (
                      'title' => 'Select',
                      'page' => 'crud/datatables/extensions/select',
                    ),
                  ),
                ),
              ),
            ),
            3 => 
            array (
              'title' => 'File Upload',
              'desc' => '',
              'icon' => 'media/svg/icons/Shopping/Gift.svg',
              'bullet' => 'dot',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Image Input',
                  'page' => 'crud/file-upload/image-input',
                ),
                1 => 
                array (
                  'title' => 'DropzoneJS',
                  'page' => 'crud/file-upload/dropzonejs',
                ),
                2 => 
                array (
                  'title' => 'Uppy',
                  'page' => 'crud/file-upload/uppy',
                ),
              ),
            ),
          ),
        ),
      ),
      4 => 
      array (
        'title' => 'Apps',
        'root' => true,
        'toggle' => 'click',
        'submenu' => 
        array (
          'type' => 'classic',
          'alignment' => 'left',
          'items' => 
          array (
            0 => 
            array (
              'title' => 'Users',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/Communication/Address-card.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'List - Default',
                  'page' => 'custom/apps/user/list-default',
                ),
                1 => 
                array (
                  'title' => 'List - Datatable',
                  'page' => 'custom/apps/user/list-datatable',
                ),
                2 => 
                array (
                  'title' => 'List - Columns 1',
                  'page' => 'custom/apps/user/list-columns-1',
                ),
                3 => 
                array (
                  'title' => 'List - Columns 2',
                  'page' => 'custom/apps/user/list-columns-2',
                ),
                4 => 
                array (
                  'title' => 'Add User',
                  'page' => 'custom/apps/user/add-user',
                ),
                5 => 
                array (
                  'title' => 'Edit User',
                  'page' => 'custom/apps/user/edit-user',
                ),
              ),
            ),
            1 => 
            array (
              'title' => 'Profile',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/Communication/Address-card.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Profile 1',
                  'bullet' => 'line',
                  'submenu' => 
                  array (
                    0 => 
                    array (
                      'title' => 'Overview',
                      'page' => 'custom/apps/profile/profile-1/overview',
                    ),
                    1 => 
                    array (
                      'title' => 'Personal Information',
                      'page' => 'custom/apps/profile/profile-1/personal-information',
                    ),
                    2 => 
                    array (
                      'title' => 'Account Information',
                      'page' => 'custom/apps/profile/profile-1/account-information',
                    ),
                    3 => 
                    array (
                      'title' => 'Change Password',
                      'page' => 'custom/apps/profile/profile-1/change-password',
                    ),
                    4 => 
                    array (
                      'title' => 'Email Settings',
                      'page' => 'custom/apps/profile/profile-1/email-settings',
                    ),
                  ),
                ),
                1 => 
                array (
                  'title' => 'Profile 2',
                  'page' => 'custom/apps/profile/profile-2',
                ),
                2 => 
                array (
                  'title' => 'Profile 3',
                  'page' => 'custom/apps/profile/profile-3',
                ),
                3 => 
                array (
                  'title' => 'Profile 4',
                  'page' => 'custom/apps/profile/profile-4',
                ),
              ),
            ),
            2 => 
            array (
              'title' => 'Contacts',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/Communication/Adress-book1.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'List - Columns',
                  'page' => 'custom/apps/contacts/list-columns',
                ),
                1 => 
                array (
                  'title' => 'List - Datatable',
                  'page' => 'custom/apps/contacts/list-datatable',
                ),
                2 => 
                array (
                  'title' => 'View Contact',
                  'page' => 'custom/apps/contacts/view-contact',
                ),
                3 => 
                array (
                  'title' => 'Add Contact',
                  'page' => 'custom/apps/contacts/add-contact',
                ),
                4 => 
                array (
                  'title' => 'Edit Contact',
                  'page' => 'custom/apps/contacts/edit-cotact',
                ),
              ),
            ),
            3 => 
            array (
              'title' => 'Chat',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/Communication/Mail-opened.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Private',
                  'page' => 'custom/apps/chat/private',
                ),
                1 => 
                array (
                  'title' => 'Group',
                  'page' => 'custom/apps/chat/group',
                ),
                2 => 
                array (
                  'title' => 'Popup',
                  'page' => 'custom/apps/chat/popup',
                ),
              ),
            ),
            4 => 
            array (
              'title' => 'Projects',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/Shopping/Box2.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'List - Columns 1',
                  'page' => 'custom/apps/projects/list-columns-1',
                ),
                1 => 
                array (
                  'title' => 'List - Columns 2',
                  'page' => 'custom/apps/projects/list-columns-2',
                ),
                2 => 
                array (
                  'title' => 'List - Columns 3',
                  'page' => 'custom/apps/projects/list-columns-3',
                ),
                3 => 
                array (
                  'title' => 'List - Columns 4',
                  'page' => 'custom/apps/projects/list-columns-4',
                ),
                4 => 
                array (
                  'title' => 'List - Datatable',
                  'page' => 'custom/apps/projects/list-datatable',
                ),
                5 => 
                array (
                  'title' => 'View Project',
                  'page' => 'custom/apps/projects/view-project',
                ),
                6 => 
                array (
                  'title' => 'Add Project',
                  'page' => 'custom/apps/projects/add-project',
                ),
                7 => 
                array (
                  'title' => 'Edit Project',
                  'page' => 'custom/apps/projects/edit-project',
                ),
              ),
            ),
            5 => 
            array (
              'title' => 'Support Center',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/General/Shield-check.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Home 1',
                  'page' => 'custom/apps/support-center/home-1',
                ),
                1 => 
                array (
                  'title' => 'Home 2',
                  'page' => 'custom/apps/support-center/home-2',
                ),
                2 => 
                array (
                  'title' => 'FAQ 1',
                  'page' => 'custom/apps/support-center/faq-1',
                ),
                3 => 
                array (
                  'title' => 'FAQ 2',
                  'page' => 'custom/apps/support-center/faq-2',
                ),
                4 => 
                array (
                  'title' => 'FAQ 3',
                  'page' => 'custom/apps/support-center/faq-3',
                ),
                5 => 
                array (
                  'title' => 'Feedback',
                  'page' => 'custom/apps/support-center/feedback',
                ),
                6 => 
                array (
                  'title' => 'License',
                  'page' => 'custom/apps/support-center/license',
                ),
              ),
            ),
            6 => 
            array (
              'title' => 'Todo',
              'bullet' => 'dot',
              'icon' => 'media/svg/icons/Communication/Clipboard-list.svg',
              'submenu' => 
              array (
                0 => 
                array (
                  'title' => 'Tasks',
                  'page' => 'custom/apps/todo/tasks',
                ),
                1 => 
                array (
                  'title' => 'Docs',
                  'page' => 'custom/apps/todo/docs',
                ),
                2 => 
                array (
                  'title' => 'Files',
                  'page' => 'custom/apps/todo/files',
                ),
              ),
            ),
            7 => 
            array (
              'title' => 'Inbox',
              'bullet' => 'dot',
              'label' => 
              array (
                'type' => 'label-danger label-inline',
                'value' => 'new',
              ),
              'icon' => 'media/svg/icons/General/Shield-check.svg',
              'page' => 'custom/apps/inbox',
            ),
          ),
        ),
      ),
      5 => 
      array (
        'title' => 'Pages',
        'root' => true,
        'toggle' => 'click',
        'submenu' => 
        array (
          'type' => 'mega',
          'width' => '1000px',
          'alignment' => 'center',
          'columns' => 
          array (
            0 => 
            array (
              'bullet' => 'line',
              'heading' => 
              array (
                'heading' => true,
                'title' => 'Pricing Tables',
                'desc' => '',
              ),
              'items' => 
              array (
                0 => 
                array (
                  'title' => 'Pricing Tables 1',
                  'page' => 'custom/pages/pricing/pricing-1',
                ),
                1 => 
                array (
                  'title' => 'Pricing Tables 2',
                  'page' => 'custom/pages/pricing/pricing-2',
                ),
                2 => 
                array (
                  'title' => 'Pricing Tables 3',
                  'page' => 'custom/pages/pricing/pricing-3',
                ),
                3 => 
                array (
                  'title' => 'Pricing Tables 4',
                  'page' => 'custom/pages/pricing/pricing-4',
                ),
              ),
            ),
            1 => 
            array (
              'bullet' => 'line',
              'heading' => 
              array (
                'heading' => true,
                'title' => 'Wizards',
                'desc' => '',
              ),
              'items' => 
              array (
                0 => 
                array (
                  'title' => 'Wizard 1',
                  'page' => 'custom/pages/wizard/wizard-1',
                ),
                1 => 
                array (
                  'title' => 'Wizard 2',
                  'page' => 'custom/pages/wizard/wizard-2',
                ),
                2 => 
                array (
                  'title' => 'Wizard 3',
                  'page' => 'custom/pages/wizard/wizard-3',
                ),
                3 => 
                array (
                  'title' => 'Wizard 4',
                  'page' => 'custom/pages/wizard/wizard-4',
                ),
              ),
            ),
            2 => 
            array (
              'bullet' => 'line',
              'heading' => 
              array (
                'heading' => true,
                'title' => 'Invoices & FAQ',
                'desc' => '',
                'bullet' => 'dot',
              ),
              'items' => 
              array (
                0 => 
                array (
                  'title' => 'Invoice 1',
                  'page' => 'custom/pages/invoices/invoice-1',
                ),
                1 => 
                array (
                  'title' => 'Invoice 2',
                  'page' => 'custom/pages/invoices/invoice-2',
                ),
                2 => 
                array (
                  'title' => 'FAQ 1',
                  'page' => 'custom/pages/faq/faq-1',
                ),
              ),
            ),
            3 => 
            array (
              'bullet' => 'line',
              'heading' => 
              array (
                'heading' => true,
                'title' => 'User Pages',
                'bullet' => 'dot',
              ),
              'items' => 
              array (
                0 => 
                array (
                  'title' => 'Login 1',
                  'page' => 'custom/pages/user/login-1',
                  'new-tab' => true,
                ),
                1 => 
                array (
                  'title' => 'Login 2',
                  'page' => 'custom/pages/user/login-2',
                  'new-tab' => true,
                ),
                2 => 
                array (
                  'title' => 'Login 3',
                  'page' => 'custom/pages/user/login-3',
                  'new-tab' => true,
                ),
                3 => 
                array (
                  'title' => 'Login 4',
                  'page' => 'custom/pages/user/login-4',
                  'new-tab' => true,
                ),
                4 => 
                array (
                  'title' => 'Login 5',
                  'page' => 'custom/pages/user/login-5',
                  'new-tab' => true,
                ),
                5 => 
                array (
                  'title' => 'Login 6',
                  'page' => 'custom/pages/user/login-6',
                  'new-tab' => true,
                ),
              ),
            ),
            4 => 
            array (
              'bullet' => 'line',
              'heading' => 
              array (
                'heading' => true,
                'title' => 'Error Pages',
                'bullet' => 'dot',
              ),
              'items' => 
              array (
                0 => 
                array (
                  'title' => 'Error 1',
                  'page' => 'custom/pages/errors/error-1',
                  'new-tab' => true,
                ),
                1 => 
                array (
                  'title' => 'Error 2',
                  'page' => 'custom/pages/errors/error-2',
                  'new-tab' => true,
                ),
                2 => 
                array (
                  'title' => 'Error 3',
                  'page' => 'custom/pages/errors/error-3',
                  'new-tab' => true,
                ),
                3 => 
                array (
                  'title' => 'Error 4',
                  'page' => 'custom/pages/errors/error-4',
                  'new-tab' => true,
                ),
                4 => 
                array (
                  'title' => 'Error 5',
                  'page' => 'custom/pages/errors/error-5',
                  'new-tab' => true,
                ),
                5 => 
                array (
                  'title' => 'Error 6',
                  'page' => 'custom/pages/errors/error-6',
                  'new-tab' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'suffix' => NULL,
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => 'myhomestoragesolutions.com',
      'secret' => 'de014458626f207e0135c4249ef574de-3d0809fb-be669892',
      'endpoint' => 'api.eu.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'my_home_storage_solutions_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'site_configurations' => 1,
  'stripe' => 
  array (
    'key' => 'pk_test_51I6KYqKcflnJ18NjHtlPoFiF8kl1FTF4cHaXDnvICdC7v4Rx58J9yibmTbNQSrqpp4AwW7ehEkuYfnZeKrzMfC0y001SLth5AR',
    'secret' => 'sk_test_51I6KYqKcflnJ18NjdA0NirNLuTo3F9GThbSvPIEgmmRUSI6ulFoBzBsVt5P7xPQe37qfbYEFYFnML0AbEJKiwa7Q00ojwDsDcm',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/Users/colinbarstow/repos/my-home-storage-solutions/resources/views',
    ),
    'compiled' => '/Users/colinbarstow/repos/my-home-storage-solutions/storage/framework/views',
  ),
  'flare' => 
  array (
    'key' => NULL,
    'reporting' => 
    array (
      'anonymize_ips' => true,
      'collect_git_information' => false,
      'report_queries' => true,
      'maximum_number_of_collected_queries' => 200,
      'report_query_bindings' => true,
      'report_view_data' => true,
      'grouping_type' => NULL,
      'report_logs' => true,
      'maximum_number_of_collected_logs' => 200,
      'censor_request_body_fields' => 
      array (
        0 => 'password',
      ),
    ),
    'send_logs_as_events' => true,
    'censor_request_body_fields' => 
    array (
      0 => 'password',
    ),
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'light',
    'enable_share_button' => true,
    'register_commands' => false,
    'ignored_solution_providers' => 
    array (
      0 => 'Facade\\Ignition\\SolutionProviders\\MissingPackageSolutionProvider',
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'cashier' => 
  array (
    'key' => 'pk_test_51I6KYqKcflnJ18NjHtlPoFiF8kl1FTF4cHaXDnvICdC7v4Rx58J9yibmTbNQSrqpp4AwW7ehEkuYfnZeKrzMfC0y001SLth5AR',
    'secret' => 'sk_test_51I6KYqKcflnJ18NjdA0NirNLuTo3F9GThbSvPIEgmmRUSI6ulFoBzBsVt5P7xPQe37qfbYEFYFnML0AbEJKiwa7Q00ojwDsDcm',
    'path' => 'stripe',
    'webhook' => 
    array (
      'secret' => NULL,
      'tolerance' => 300,
    ),
    'model' => 'App\\Models\\User',
    'currency' => 'gbp',
    'currency_locale' => 'en_GB',
    'payment_notification' => NULL,
    'paper' => 'letter',
    'logger' => 'stack',
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Http\\Livewire',
    'view_path' => '/Users/colinbarstow/repos/my-home-storage-solutions/resources/views/livewire',
    'layout' => 'layouts.app',
    'asset_url' => NULL,
    'app_url' => NULL,
    'middleware_group' => 'web',
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
    ),
    'manifest_path' => NULL,
    'back_button_cache' => false,
    'render_on_redirect' => false,
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 94,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
