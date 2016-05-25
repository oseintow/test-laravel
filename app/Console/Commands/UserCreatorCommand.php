<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class UserCreatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create
            {name : Name of the user}
            {--d|dob=2016-10-10 : Date of birth}
        ';

    // Optional argument...
    //user:create {name?}

    // Optional argument with default value...
    //user:create {name=foo}

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new record in the users table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        $this->info("The name that you want to add is {$name}.");

        $dateofbirth = $this->option('dateofbirth');

        if($dateofbirth)
            $this->info("The name that you want to add is {$dateofbirth}.");
    }

//    public function getArguments()
//    {
//        return [
//            ["name", InputArgument::REQUIRED, "Name of the user"]
//        ];
//    }
//
//    public function getOptions()
//    {
//        return [
//            ["example", InputOption::VALUE_OPTIONAL, 'An example option',null]
//        ];
//    }
}
