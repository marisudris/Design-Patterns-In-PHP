<?php
declare(strict_types=1);

use harlequiin\Patterns\Builder\MysqlQueryBuilder;
use PHPUnit\Framework\TestCase;

class MysqlQueryBuilderTest extends TestCase
{
    public function setUp(): void
    {
        $this->builder = new MysqlQueryBuilder();
    }

    public function testReturnsCorrectSelectStatement()
    {
        $query = $this->builder
                      ->select("username")
                      ->from("user")
                      ->getQuery();

        $this->assertEquals(
            "SELECT `username` FROM `user`;",
            $query
        );
    }

    public function testUsesWhereClauseCorrectly()
    {
        $query = $this->builder
                      ->select("username")
                      ->from("user")
                      ->where("first_name", "like", "M%")
                      ->getQuery();

        $this->assertEquals(
            "SELECT `username` FROM `user` WHERE `first_name` LIKE 'M%';",
            $query
        );
    }

    public function testUsesLimitClauseCorrectly()
    {
        $query = $this->builder
                      ->select("*")
                      ->from("user")
                      ->limit(10)
                      ->getQuery();

        $this->assertEquals(
            "SELECT * FROM `user` LIMIT 10;",
            $query
        );
    }

    public function testReturnsCorrectUpdateStatement()
    {
        $query = $this->builder
                      ->update("user")
                      ->set("first_name")
                      ->equalTo("Māris")
                      ->getQuery();

        $this->assertEquals(
            "UPDATE `user` SET `first_name` = 'Māris';",
            $query
        );
    }

    public function testReturnsCorrectDeleteStatement()
    {
        $query = $this->builder
                      ->delete()
                      ->from("user")
                      ->where("age", ">=", "27")
                      ->getQuery();

        $this->assertEquals(
            "DELETE FROM `user` WHERE `age` >= '27';",
            $query
        );
    }
}
