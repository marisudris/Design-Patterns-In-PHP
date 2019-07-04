<?php
declare(strict_types=1);

namespace harlequiin\Patterns\Builder;

/**
 * Builder.
 * Specifies an abstract interface for creating
 * parts of a product object.
 */
interface QueryBuilderInterface
{
    public function select(string ...$fields): self;
    public function update(string $table): self;
    public function delete(string $table): self;
    public function set(string $field, string $value): self;
    public function where(string $field, string $comparison, string $value): self;
    public function equalTo(string $value): self;
    public function limit(int $value): self;
    public function getSql(): string;
}
