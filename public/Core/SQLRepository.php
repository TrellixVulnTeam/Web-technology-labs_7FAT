<?php

namespace Core;

use DatabaseMigrations\MigrationVer1;
use PDO;

abstract class SQLRepository implements Repository
{
    protected const CREATE = 'CREATE';
    protected const READ = 'READ';
    protected const UPDATE = 'UPDATE';
    protected const DELETE = 'DELETE';


    private array $SQLQuery;

    protected $PDO;

    public function __construct()
    {
        $dsn = 'mysql:host=database:3306;dbname='.getenv('DB_DATABASE').';charset=utf8';
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->PDO = new \PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'), $opt);

        $this->SQLQuery = [];

        if (!defined('MIGRATION_MADE')) {
            $commands = MigrationVer1::command();

            foreach ($commands as $cmd) {
                $this->PDO->prepare($cmd)->execute();
            }

            define('MIGRATION_MADE', true);
        }
    }

    protected function addToQuery($statement) {
        $this->SQLQuery[] = $statement;
    }

    public function exec() {
        foreach ($this->SQLQuery as $statement) {
            $stmt = $this->PDO->prepare($statement[0]);

            //var_dump($statement);

            if ($statement[2] === self::CREATE) {
                foreach ($statement[1]['rowsFull'] as $name => &$value) {
                    if ($name == 'id') continue;
                        $stmt->bindParam(':'.$name, $value);
                }
            }
            if ($statement[2] === self::UPDATE) {
                foreach ($statement[1]['rowsFull'] as $name => &$value) {
                    $stmt->bindParam(':'.$name, $value);
                }
            }

            $stmt->execute();
        }
    }
}
