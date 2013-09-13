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

namespace Replication;

class Model_Replication extends \Orm\Model
{

	/**
	 * @var  string  connection to use
	 */
	protected static $_connection = null;

	/**
	 * @var  string  write connection to use
	 */
	protected static $_write_connection = null;
	
	/**
	 * Initialize db connections.
	 */
	public static function _init()
	{
		\Config::load('replication', true);

		$slave = \Config::get('replication.slave', array());
		$master = \Config::get('replication.master', array());

		is_null(static::$_connection) and static::$_connection = ($slave ? \Arr::get($slave, rand(0, count($slave) - 1)) : null);
		is_null(static::$_write_connection) and static::$_write_connection = ($master ? \Arr::get($master, rand(0, count($master) - 1)) : null);
	}
}