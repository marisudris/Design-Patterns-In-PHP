<?php
declare(strict_types=1);

use harlequiin\Patterns\Builder\QueryBuilder;
use harlequiin\Patterns\Builder\MysqlQueryBuilder;

/**
 * The client code uses the builder directly. A Director class is not needed 
 * because the client code needs different queries every time, 
 * so the sequence of the building steps cannot be easily reused.
 */
class App
{
    /**
     * @var QueryBuilder
     */
    private $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function run() 
    {
        // ....code...
        $this->querybuilder
             ->select('first_name', 'last_name')
             ->from('employee')
             ->where("age", "<", "30")
             ->getQuery();
        // ...code...
    }
}

$app = new App(new MysqlQueryBuilder());
$app->run(new MysqlQueryBuilder());
