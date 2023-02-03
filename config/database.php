<?php

use Illuminate\Support\Str;

return [

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

    'default' => env('DB_CONNECTION', 'mysql'),

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
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_GCC', 'ggi_is'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD', 'satu1'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_ggi_is' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_GCC', 'ggi_is'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD', 'satu1'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_hris' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_HRIS', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_HRIS', 'gistexhrm'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_HRIS', 'satu1'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => [\PDO::ATTR_EMULATE_PREPARES => true,
                extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : []],
        ],

        'mysql_jdeapi' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_JDEAPI', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_JDEAPI', 'jdeapi'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_JDEAPI', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options'   => [
                \PDO::ATTR_EMULATE_PREPARES => true
            ],
            'modes' => [
                //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                'NO_AUTO_CREATE_USER',
                'NO_ENGINE_SUBSTITUTION'
            ]
        ],

        'mysql_qc' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_QC', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_QC', 'db_qc'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_QC', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_prc' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_PRC', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_PRC', 'db_purchasing'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_PRC', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_ppic' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_PPIC', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_PPIC', 'db_ppic'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_PPIC', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_tower' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_TOWER', '10.8.0.107'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_TOWER', 'signaltower'),
            'username' => env('DB_USERNAME_TOWER', 'root'),
            'password' => env('DB_PASSWORD_TOWER', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_indah' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_INDAH', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_INDAH', 'indah_db'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_INDAH', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_ticket' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_TICKET', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_TICKET', 'ticketing_db'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_TICKET', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_sample' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_SAMPLE', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_SAMPLE', 'db_sample'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_SAMPLE', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_product_costing' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_PRODUCT_COSTING', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_PRODUCT_COSTING', 'db_product_costing'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_PRODUCT_COSTING', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_smqc' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_SMQC', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_SMQC', 'smqc'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_SMQC', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],


        'mysql_audit' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_AUDIT', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_AUDIT', 'db_audit_buyer'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_AUDIT', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_asset' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_ASSET', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_ASSET', 'db_asset'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_ASSET', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_mkt' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_MKT', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_MKT', 'prodqrcode'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_MKT', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options'   => [
                \PDO::ATTR_EMULATE_PREPARES => true
            ],
            'modes' => [
                //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                'NO_AUTO_CREATE_USER',
                'NO_ENGINE_SUBSTITUTION'
            ]
        ],

        'mysql_mkt_qr' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_MKT_QR', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_MKT_QR', 'forge'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'forge'),
            'password' => env('DB_PASSWORD_MKT_QR', ''),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'modes'       => [
                //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                //'NO_AUTO_CREATE_USER', // This has been deprecated and will throw an error in mysql v8
                'NO_ENGINE_SUBSTITUTION',
            ],
        ],

        'mysql_audit_buyer' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_AUDIT_BUYER', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_AUDIT_BUYER', 'db_audit_buyer'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_AUDIT_BUYER', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'modes'       => [
                //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                //'NO_AUTO_CREATE_USER', // This has been deprecated and will throw an error in mysql v8
                'NO_ENGINE_SUBSTITUTION',
            ],
            'options'   => [
                \PDO::ATTR_EMULATE_PREPARES => true
            ]
        ],

        'mysql_vp' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_VP', '10.8.150.31'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_VP', 'hpy_gistex'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_VP', 'ketikaja123'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options'   => [
                \PDO::ATTR_EMULATE_PREPARES => true
            ],
            'modes' => [
                //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                'NO_AUTO_CREATE_USER',
                'NO_ENGINE_SUBSTITUTION'
            ]
        ],

        'mysql_work_plan' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_WORK_PLAN', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_WORK_PLAN', 'db_work_plan'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_WORK_PLAN', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_hrga' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_HRGA', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_HRGA', 'db_hr_ga'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_HRGA', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

        'mysql_prod_sch' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_PROD_SCH', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_PROD_SCH', 'production_schedule'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_PROD_SCH', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
        ],

        'mysql_robotik_mjk' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_ROBOTIK_MJK', '10.5.0.106'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_ROBOTIK_MJK', 'db_monitoring'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_ROBOTIK_MJK', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
        ],

        'mysql_mat_doc' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_MAT_DOC', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_MAT_DOC', 'db_mat_doc'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_MAT_DOC', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'modes' => [
                //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                'NO_AUTO_CREATE_USER',
                'NO_ENGINE_SUBSTITUTION'
            ],
            'options' => [\PDO::ATTR_EMULATE_PREPARES => true,
                extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : []],
        ],

        'mysql_smv' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_SMV', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_SMV', 'gistexsmv'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'root'),
            'password' => env('DB_PASSWORD_SMV', 'satu1'),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_block_budget' => [
            'driver' => env('DB_CONNECTION_DRIVER_MYSQL'),
            'host' => env('DB_HOST_BLOCK_BUDGET', '127.0.0.1'),
            'port' => env('DB_PORT_MYSQL_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_BLOCK_BUDGET', 'forge'),
            'username' => env('DB_USERNAME_MYSQL_DEFAULT', 'forge'),
            'password' => env('DB_PASSWORD_BLOCK_BUDGET', ''),
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],



        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'tna_produksi' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => "10.8.100.1\GGI", // 10.8.100.1
            'port' => '57953',
            'database' => 'biov6',
            'username' => 'sa',
            'password' => 'unyu',
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'tna_staff' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => "10.8.0.94\SQLEXPRESS", //10.8.0.94
            'port' => '56404',
            'database' => 'biov6',
            'username' => 'sa',
            'password' => 'otadmin',
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'tna_maja_produksi' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => "10.5.0.51\sqlexpress",
            'port' => '50029',
            'database' => 'biov6',
            'username' => 'sa',
            'password' => 'unyu',
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

        'tna_maja_staff' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => "10.5.0.49\sqlexpress",
            'port' => '55815',
            'database' => 'biov6',
            'username' => 'sa',
            'password' => 'otadmin',
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
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
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */
 'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],


        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];