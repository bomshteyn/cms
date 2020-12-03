<?php

namespace Statamic\GraphQL\Queries;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Statamic\Facades;
use Statamic\GraphQL\Types\EntryInterface;

class Entry extends Query
{
    public function type(): Type
    {
        return GraphQL::type(EntryInterface::NAME);
    }

    public function args(): array
    {
        return [
            'id' => Type::string(),
        ];
    }

    public function resolve($root, $args)
    {
        $query = Facades\Entry::query();

        if ($id = $args['id']) {
            $query->where('id', $id);
        }

        return $query->limit(1)->get()->first();
    }
}
