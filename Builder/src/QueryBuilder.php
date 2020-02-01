<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Builder;

/**
 * Builder.
 *
 * Specifies an abstract interface for creating
 * and assembling a product.
 */
interface QueryBuilder
{
    public function select(string ...$fields): QueryBuilder;
    public function update(string $table): QueryBuilder;
    public function delete(): QueryBuilder;
    public function from(string $table): QueryBuilder;
    public function set(string $field): QueryBuilder;
    public function where(string $field, string $comparison, string $value): QueryBuilder;
    public function equalTo(string $value): QueryBuilder;
    public function limit(int $value): QueryBuilder;
    public function getQuery(): string;
}
