<?php
/**
 * Orm-Replication
 *
 * This package offers Model_Replication which enables 
 * suitable DB connection of replication composition. 
 *
 * @package    Orm-Replication
 * @version    1.0
 * @author     Shintaro Ikezaki - @hackoh
 * @license    MIT License
 * @link       http://github.com/hackoh
 */

Autoloader::add_core_namespace('Replication');

Autoloader::add_classes(array(
	'Replication\\Model_Replication' => __DIR__ . '/classes/model/replication.php',
));