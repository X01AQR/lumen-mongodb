<?php
namespace App\Console\Commands;
use Flipbox\LumenGenerator\Console\ModelMakeCommand as Command;
class ModelMakeCommand extends Command
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Models";
    }
}
