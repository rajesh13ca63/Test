 <?php
 
return [
 
    'defaults' => [
        'guard'     => 'users',
        'passwords' => 'users',
    ],
 
    'guards' => [
        'users' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],
 
        'api' => [
            'driver'   => 'token',
            'provider' => 'users',
        ],
        
        // For admin
       'admins' => [
            'driver'   => 'session',
            'provider' => 'admins'
        ],

         // For Client
        'clients' =>[
            'driver'    => 'session',
            'provider'  => 'clients',
        ],

         // For Recruiter
        'recruiters' => [
            'driver'    => 'session',
            'provider'  => 'recruiters',
        ],
        // For Boutiques
        'boutiques' => [
            'driver'    => 'session',
            'provider'  => 'boutiques',
        ],
    ],
 
    // providers
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        
        // For admin
         'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class
        ],

        // For client
        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Client::class,
        ],

        // For recruiters
        'recruiters' => [
            'driver' => 'eloquent',
            'model' => App\Recruiter::class,
        ],

        // For boutiques
        'boutiques' => [
            'driver' => 'eloquent',
            'model' => App\Boutique::class,
        ],
    ],
 
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'clients' => [
            'provider' => 'clients',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'recruiters' => [
            'provider' => 'recruiters',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'boutiques' => [
            'provider' => 'boutiques',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ]        
    ]
 
];
