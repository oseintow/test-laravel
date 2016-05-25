<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModelGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:model
        {name : Model name}
        {--p|path=app : Model Path}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new model.';
    /**
     * @var ModelGenerator
     */
    private $generator;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ModelGenerator $generator)
    {
        parent::__construct();

        $this->generator = $generator;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = $this->getPath();

        if($this->generator->make($path)){
            return $this->info("Created {$path}");
        }

        $this->error("Could not create {$path}");
//        $this->info("The name argument is " . $this->argument('name'));
    }

    protected function getPath()
    {
        return $this->option('path') . "/" . ucwords($this->argument('name')) . '.php';
    }
}
