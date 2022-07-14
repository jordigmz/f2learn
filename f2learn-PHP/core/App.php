<?php
namespace f2learn\core;

use f2learn\app\exceptions\AppException;
use f2learn\core\database\Connection;
use f2learn\core\database\QueryBuilder;

class App
{
    private static array $container = [];

    public static function bind(string $key, $value) {
        static::$container[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get(string $key) {
        if (!array_key_exists($key, static::$container))
            throw new AppException("Key $key not found in the container");

        return static::$container[$key];
    }

    /**
     * @return mixed
     * @throws AppException
     */
    public static function getConnection() {
        if (!array_key_exists('connection', static::$container))
            static::$container['connection'] = Connection::make();

        return static::$container['connection'];
    }

    /**
     * @param string $className
     * @return QueryBuilder
     */
    public static function getRepository(string $className) : QueryBuilder
    {
        if(!array_key_exists($className, static::$container)) {
            static::$container[$className] = new $className();
        }

        return static::$container[$className];
    }
}