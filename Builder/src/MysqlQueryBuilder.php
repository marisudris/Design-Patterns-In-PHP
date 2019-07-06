<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Builder;

/**
 * ConcreteBuilder.
 * Constructs, assembles parts of of the product by implementing
 * the Builder interface.
 * Defines and keeps track of the representation it creates.
 * In this case Product is the sql string.
 */
class MysqlQueryBuilder implements QueryBuilderInterface
{
    /**
     * @var string query string
     */
    protected $query;

    public function select(string ...$fields): QueryBuilderInterface
    {
        $this->query = "SELECT ";

        if ($fields[0] == "*") {
            $this->query .= "* ";
            return $this;
        }

        foreach ($fields as $field) {
            $this->query .= "`{$field}` ";
        }
        return $this;
    }

    public function from(string $table): QueryBuilderInterface
    {
        $this->query .= "FROM `{$table}`";
        return $this;
    }

    public function update(string $table): QueryBuilderInterface
    {
        $this->query .= "UPDATE `{$table}` ";
        return $this;
    }

    public function delete(): QueryBuilderInterface
    {
        $this->query .= "DELETE ";
        return $this;
    }

    public function set(string $field): QueryBuilderInterface
    {
        $this->query .= "SET `{$field}`";
        return $this;
    }

    public function where(string $field, string $comparison, string $value): QueryBuilderInterface
    {
        $comparison = \strtoupper($comparison);
        $this->query .= " WHERE `{$field}` {$comparison} '{$value}'";
        return $this;
    }

    public function equalTo(string $value): QueryBuilderInterface
    {
        $this->query .= " = '{$value}'";
        return $this;
    }

    public function limit(int $value): QueryBuilderInterface
    {
        $this->query .= " LIMIT {$value}";
        return $this;
    }

    public function getQuery(): string
    {
        $this->query .= ";";
        $query = $this->query;

        $this->reset();
        return $query;
    }

    protected function reset(): void
    {
        $this->query = "";
    }
}
