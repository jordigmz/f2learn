<?php
namespace f2learn\core\database;

use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\QueryException;
use f2learn\core\App;
use PDO;
use PDOException;

abstract class QueryBuilder
{
    private PDO $connection;
    private string $table;
    private string $classEntity;

    /**
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table, string $classEntity)
    {
        $this->table = $table;
        $this->classEntity = $classEntity;
        $this->connection = App::getConnection();
    }

    /**
     * @param string $sql
     * @param array $parameters
     * @return array
     * @throws QueryException
     */
    private function executeQuery(string $sql, array $parameters = []) : array
    {
        $pdoStatement = $this->connection->prepare($sql);

        if($pdoStatement->execute($parameters) === false) {
            throw new QueryException('Requested query could not be executed');
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    /**
     * @return array
     * @throws QueryException
     */
    public function findAll() : array
    {
        $sql = "SELECT * from $this->table";

        return $this->executeQuery($sql);
    }

    /**
     * @param int $id
     * @return IEntity
     * @throws NotFoundException
     * @throws QueryException
     */
    public function find(int $id) : IEntity
    {
        $sql = "SELECT * from $this->table WHERE id=$id";

        $result = $this->executeQuery($sql);

        if (empty($result))
            throw new NotFoundException("No element found with id $id");

        return $result[0];
    }

    /**
     * @param array $filters
     * @return string
     */
    private function getFilters(array $filters)
    {
        if (empty($filters))
            return '';

        $strFilters = [];

        foreach ($filters as $key=>$value) {
            $strFilters[] = $key . '=:' . $key;
        }

        return ' WHERE ' . implode(' and ', $strFilters);
    }

    /**
     * @param array $filters
     * @return array
     * @throws QueryException
     */
    public function findBy(array $filters) : array
    {
        $sql = "SELECT * from $this->table " . $this->getFilters($filters);

        return $this->executeQuery($sql, $filters);
    }

    /**
     * @param array $filters
     * @return IEntity|null
     * @throws QueryException
     */
    public function findOneBy(array $filters) : ?IEntity
    {
        $result = $this->findBy($filters);

        if (count($result) > 0)
            return $result[0];

        return null;
    }

    /**
     * @param IEntity $entity
     * @throws QueryException
     */
    public function save(IEntity $entity) : void
    {
        try {
            $parameters = $entity->toArray();

            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
            );
            $statement =  $this->connection->prepare($sql);

            $statement->execute($parameters);
        } catch (PDOException $queryException) {
            throw new QueryException('Error inserting into database');
        }

    }

    /**
     * @param int $id
     * @return void
     * @throws QueryException
     */
    public function delete(int $id) : void
    {
        $sql = "DELETE from $this->table WHERE id=$id";

        $this->executeQuery($sql);
    }

    /**
     * @param array $parameters
     * @return string
     */
    private function getUpdates(array $parameters) : string
    {
        $updates  = '';

        foreach ($parameters as $key => $value) {
            if ($key !== 'id') {
                if ($updates !== '')
                    $updates .= ', ';
                $updates .= $key . '=:' . $key;
            }
        }

        return $updates;
    }

    /**
     * @param IEntity $entity
     * @throws QueryException
     */
    public function update(IEntity $entity) : void
    {
        try {
            $parameters = $entity->toArray();

            $sql = sprintf(
                'UPDATE %s SET %s WHERE id=:id',
                $this->table,
                $this->getUpdates($parameters)
            );

            $statement = $this->connection->prepare($sql);

            $statement->execute($parameters);

        } catch (PDOException $pdoException) {
            throw new QueryException('Error updating element with id ' . $parameters['id']);
        }
    }

    /**
     * @param callable $fnExecuteQuerys
     * @throws QueryException
     */
    public function executeTransaction(callable $fnExecuteQuerys)
    {
        try {
            $this->connection->beginTransaction();

            $fnExecuteQuerys();

            $this->connection->commit();

        } catch (PDOException $pdoException) {
            $this->connection->rollBack();
            throw new QueryException('The operation could not be carried out');
        }
    }
}