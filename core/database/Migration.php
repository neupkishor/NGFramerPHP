<?php

namespace ngframerphp\core\database;

use ngframerphp\utility\UtilCommon;

class Migration
{
    private array $migrations;


    public function __construct()
    {
        $this->migrations = $this->getMigrations();
    }


    private function getMigrations(): array
    {
        $migrations = scandir(ROOT."/core/migrations");
        UtilCommon::deleteArrayData($files,['.','..'], false);
        return $migrations;
    }


    private function getAppliedMigrations()
    {
    }


    private function getNewMigrations(): array
    {
        return array_diff($this->getAppliedMigrations(), $this->migrations);
    }


    private function createMigrationsTable(): void
    {
    }


    public function applyMigrations(): void
    {
        $this->createMigrationsTable();
        $toApplyMigrations = $this->getNewMigrations();

        foreach ($toApplyMigrations as $indivMigration){
            require_once ROOT.'/core/migrations/'.$indivMigration;
            $migrationClassName = pathinfo($indivMigration, PATHINFO_FILENAME);
            $migrationInstance = new $migrationClassName();
            echo "applying migration $indivMigration".PHP_EOL;
            $migrationInstance-> up();
            echo "applied migration $indivMigration".PHP_EOL;
            $newMigrations[] = $indivMigration;
        }

        if (!empty($newMigration)){
            $this->saveMigrations($newMigration);
        } else {
            echo "all migrations are applied.";
        }
    }


    private function saveMigrations(array $newMigrations): void
    {
        array_map(fn($m) => $m );
        $this->connection->prepare("INSERT INTO migrations (migration) VALUES ()");
    }


}