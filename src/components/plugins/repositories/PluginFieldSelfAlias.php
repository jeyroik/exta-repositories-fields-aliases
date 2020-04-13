<?php
namespace extas\components\plugins\repositories;

use extas\components\plugins\Plugin;
use extas\interfaces\IHasAliases;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Class PluginFieldSelfAlias
 *
 * @package extas\components\plugins\repositories
 * @author jeyroik <jeyroik@gmail.com>
 */
class PluginFieldSelfAlias extends Plugin
{
    /**
     * @param IItem $item
     */
    public function __invoke(IItem &$item)
    {
        if (($item instanceof IHasName) && ($item instanceof IHasAliases) && !$item->hasAlias($item->getName())) {
            $item->addAlias($item->getName());
        }
    }
}
