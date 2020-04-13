<?php
namespace tests;

use extas\components\repositories\Repository;

class TestEntityRepository extends Repository
{
    protected string $name = 'test';
    protected string $scope = 'extas';
    protected string $pk = TestEntity::FIELD__NAME;
    protected string $itemClass = TestEntity::class;
}
