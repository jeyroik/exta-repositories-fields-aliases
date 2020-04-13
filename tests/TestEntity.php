<?php
namespace tests;

use extas\components\Item;
use extas\components\THasAliases;
use extas\components\THasName;
use extas\interfaces\IHasAliases;
use extas\interfaces\IHasName;

/**
 * Class TestEntity
 *
 * @package tests
 * @author jeyroik@gmail.com
 */
class TestEntity extends Item implements IHasName, IHasAliases
{
    use THasAliases;
    use THasName;

    protected function getSubjectForExtension(): string
    {
        return 'test';
    }
}
