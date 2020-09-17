<?php

$DATABASE_URL = parse_url('postgres://ajmufqlenoyypp:c2b03c67e6c246af4a167e88c28e52fa28de78513932239c738527042450dd40@ec2-54-160-202-3.compute-1.amazonaws.com:5432/db8nf25mno8q6k');

/*
 |--------------------------------------------------------------------------
 | DO NOT EDIT THIS FILE DIRECTLY.
 |--------------------------------------------------------------------------
 | This file reads from your .env configuration file and should not
 | be modified directly.
*/


return [

    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'pgsql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => database_path('database.sqlite'),
            'prefix'   => '',
        ],

        'sqlite_testing' => [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'port'      => env('DB_PORT', '3306'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix'    => env('DB_PREFIX', null),
            'strict'    => false,
            'engine'    => 'InnoDB',
            'unix_socket' => env('DB_SOCKET', ''),
            'dump' => [
                'dump_binary_path' => env('DB_DUMP_PATH', '/usr/local/bin'),  // only the path, so without 'mysqldump'
                'use_single_transaction',
                'timeout' => 60 * 5, // 5 minute timeout
                //'exclude_tables' => ['table1', 'table2'],
                //'add_extra_option' => '--optionname=optionvalue',
            ],
            'options' => (env('DB_SSL')) ? ((env('DB_SSL_IS_PAAS')) ? [
                PDO::MYSQL_ATTR_SSL_CA                  => env('DB_SSL_CA_PATH'),   // /path/to/ca.pem
            ] : [
                PDO::MYSQL_ATTR_SSL_KEY                 => env('DB_SSL_KEY_PATH'),  // /path/to/key.pem
                PDO::MYSQL_ATTR_SSL_CERT                => env('DB_SSL_CERT_PATH'), // /path/to/cert.pem
                PDO::MYSQL_ATTR_SSL_CA                  => env('DB_SSL_CA_PATH'),   // /path/to/ca.pem
                PDO::MYSQL_ATTR_SSL_CIPHER              => env('DB_SSL_CIPHER')
            ]) : []
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => $DATABASE_URL['host'],
            'port'     => $DATABASE_URL['port'],
            'database' => ltrim($DATABASE_URL['path'], '/'),
            'username' => $DATABASE_URL['user'],
            'password' => $DATABASE_URL['pass'],
            'charset'  => 'utf8',
            'prefix'   => '',
            'prefix_indexes' => true,
            'schema'   => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host'     => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
