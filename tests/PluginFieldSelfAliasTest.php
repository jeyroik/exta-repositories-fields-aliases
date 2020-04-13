<?php

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use extas\components\plugins\PluginRepository;
use extas\components\plugins\Plugin;
use extas\components\plugins\repositories\PluginFieldSelfAlias;
use tests\TestEntityRepository;
use tests\TestEntity;
use extas\interfaces\repositories\IRepository;

/**
 * Class PluginUuidFieldTest
 *
 * @author jeyroik <jeyroik@gmail.com>
 */
class PluginFieldSelfAliasTest extends TestCase
{
    /**
     * @var PluginRepository|null
     */
    protected ?PluginRepository $pluginRepo = null;

    /**
     * @var IRepository|null
     */
    protected ?ExtensionRepository $testRepo = null;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->pluginRepo = new PluginRepository;
        $this->testRepo = new TestEntityRepository();
    }

    public function tearDown(): void
    {
        $this->pluginRepo->delete([Plugin::FIELD__CLASS => PluginFieldSelfAlias::class]);
        $this->testRepo->delete([TestEntity::FIELD__NAME => 'test']);
    }

    public function testAdd()
    {
        $this->installPlugin();

        /**
         * @var $test TestEntity
         */
        $test = $this->testRepo->create(new TestEntity([
            TestEntity::FIELD__NAME => 'test'
        ]));

        $this->assertEquals(['test'], $test->getAliases());
    }

    public function testDoNotDuplicate()
    {
        $this->installPlugin();

        /**
         * @var $test TestEntity
         */
        $test = $this->testRepo->create(new TestEntity([
            TestEntity::FIELD__NAME => 'test',
            TestEntity::FIELD__ALIASES => ['test']
        ]));

        $this->assertEquals(['test'], $test->getAliases());
    }

    protected function installPlugin()
    {
        $this->pluginRepo->create(new Plugin([
            Plugin::FIELD__CLASS => PluginFieldSelfAlias::class,
            Plugin::FIELD__STAGE => 'extas.test.create.before'
        ]));
    }
}
