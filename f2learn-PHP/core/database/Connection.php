<?php

namespace f2learn\core\database;

use f2learn\app\exceptions\AppException;
use f2learn\core\App;
use PDO;
use PDOException;

class Connection
{
    /**
     * @return PDO
     * @throws AppException
     */
    public static function make()
    {
        try {
            $config = App::get('config')['database'];

            $connection = new PDO(
                $config['connection']. ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $PDOException) {
            throw new AppException("The database connection could not be created.");
        }

        return $connection;
    }
}