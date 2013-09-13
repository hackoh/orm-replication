# Orm-Replication Package.

This package offers Model_Replication which enables suitable DB connection of replication composition. 

# Usage

In your config/{env}/db.php

    <?php
	return array(
		'master' => array(
			'type'        => 'pdo',
			'connection'  => array(
				'dsn'        => 'mysql:host=localhost;dbname=master_db',
				'username'   => 'dbuser',
				'password'   => 'dbpassword',
			),
			'identifier'   => '`',
			'table_prefix' => '',
			'charset'      => 'utf8',
			'enable_cache' => true,
			'profiling'    => false,
		),
		'slave1' => array(
			'type'        => 'pdo',
			'connection'  => array(
				'dsn'        => 'mysql:host=localhost;dbname=slave1_db',
				'username'   => 'dbuser',
				'password'   => 'dbpassword',
			),
			'identifier'   => '`',
			'table_prefix' => '',
			'charset'      => 'utf8',
			'enable_cache' => true,
			'profiling'    => false,
		),
		'slave2' => array(
			'type'        => 'pdo',
			'connection'  => array(
				'dsn'        => 'mysql:host=localhost;dbname=slave2_db',
				'username'   => 'dbuser',
				'password'   => 'dbpassword',
			),
			'identifier'   => '`',
			'table_prefix' => '',
			'charset'      => 'utf8',
			'enable_cache' => true,
			'profiling'    => false,
		),
	);
    
Then you can specify in config/{env}/replication.php like below.

    <?php
    return array(
        /**
    	 * Specify your connection names in config/db.php.
    	 */
    	'slave' => array('slave1', 'slave2'),
    	'master' => array('master'),
    );

Ok. you already prepared some settings for use Model_Replication.
Your model classes can extend Model_Replication instead of \Orm\Model
like below.

    <?php
    class Model_Article extends Model_Replication
    {
        //...
    }

# Notes

- If your model class has related models, then all related models must extend Model_Replicaton
- The connection of using the DB class directly, this package will not work.
- Load balancing logic of Model_Replication is the rand function of php. This means that it will not ensure even distribution.

