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
class MysqlQueryBuilder implements QueryBuilder
{
    /**
     * @var string query string
     */
    protected $query;

    public function select(string ...$fields): QueryBuilder
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

    public function from(string $table): QueryBuilder
    {
        $this->query .= "FROM `{$table}`";
        return $this;
    }

    public function update(string $table): QueryBuilder
    {
        $this->query .= "UPDATE `{$table}` ";
        return $this;
    }

    public function delete(): QueryBuilder
    {
        $this->query .= "DELETE ";
        return $this;
    }

    public function set(string $field): QueryBuilder
    {
        $this->query .= "SET `{$field}`";
        return $this;
    }

    public function where(string $field, string $comparison, string $value): QueryBuilder
    {
        $comparison = \strtoupper($comparison);
        $this->query .= " WHERE `{$field}` {$comparison} '{$value}'";
        return $this;
    }

    public function equalTo(string $value): QueryBuilder
    {
        $this->query .= " = '{$value}'";
        return $this;
    }

    public function limit(int $value): QueryBuilder
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
