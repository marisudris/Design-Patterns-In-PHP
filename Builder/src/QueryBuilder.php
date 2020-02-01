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
    public function select(string ...$fields): self;
    public function update(string $table): self;
    public function delete(): self;
    public function from(string $table): self;
    public function set(string $field): self;
    public function where(string $field, string $comparison, string $value): self;
    public function equalTo(string $value): self;
    public function limit(int $value): self;
    public function getQuery(): string;
}
