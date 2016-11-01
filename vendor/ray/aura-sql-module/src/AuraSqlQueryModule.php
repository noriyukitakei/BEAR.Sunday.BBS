<?php
/**
 * This file is part of the Ray.AuraSqlModule package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\AuraSqlModule;

use Aura\SqlQuery\Common\DeleteInterface;
use Aura\SqlQuery\Common\InsertInterface;
use Aura\SqlQuery\Common\SelectInterface;
use Aura\SqlQuery\Common\UpdateInterface;
use Ray\AuraSqlModule\Annotation\AuraSqlQueryConfig;
use Ray\Di\AbstractModule;

class AuraSqlQueryModule extends AbstractModule
{
    private $db;

    /**
     * @param string $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind()->annotatedWith(AuraSqlQueryConfig::class)->toInstance($this->db);
        $this->bind(SelectInterface::class)->toProvider(AuraSqlQuerySelectProvider::class);
        $this->bind(InsertInterface::class)->toProvider(AuraSqlQueryInsertProvider::class);
        $this->bind(UpdateInterface::class)->toProvider(AuraSqlQueryUpdateProvider::class);
        $this->bind(DeleteInterface::class)->toProvider(AuraSqlQueryDeleteProvider::class);
    }
}
