<?php
declare(strict_types=1);

use harlequiin\Patterns\Builder\QueryBuilderInterface;
use harlequiin\Patterns\Builder\MysqlQueryBuilder;

/**
 * The client code uses the builder directly. A Director class is not needed 
 * because the client code needs different queries every time, 
 * so the sequence of the building steps cannot be easily reused.
 */
class App
{
    public function run(QueryBuilderInterface $builder) 
    {
        // ....code...
        $builder->select('first_name', 'last_name')
                ->from('employee')
                ->where("age", "<", "30")
                ->getQuery();
        // ...code...
    }
}

$app = new App();
$app->run(new MysqlQueryBuilder());
