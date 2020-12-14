<?php

namespace Statamic\GraphQL;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Statamic\GraphQL\Types\AssetContainerType;
use Statamic\GraphQL\Types\AssetInterface;
use Statamic\GraphQL\Types\CollectionType;
use Statamic\GraphQL\Types\EntryInterface;
use Statamic\GraphQL\Types\GlobalSetInterface;
use Statamic\GraphQL\Types\JsonArgument;
use Statamic\GraphQL\Types\TaxonomyType;
use Statamic\GraphQL\Types\TermInterface;

class TypeRegistrar
{
    private $registered = false;

    public function register()
    {
        if ($this->registered) {
            return;
        }

        GraphQL::addType(JsonArgument::class);
        GraphQL::addType(CollectionType::class);
        GraphQL::addType(TaxonomyType::class);
        GraphQL::addType(AssetContainerType::class);
        EntryInterface::addTypes();
        TermInterface::addTypes();
        AssetInterface::addTypes();
        GlobalSetInterface::addTypes();

        $this->registered = true;
    }
}
