<?php

namespace App\Console\Commands;

use CzProject\GitPhp\Git;
use CzProject\GitPhp\GitException;
use Illuminate\Console\Command;

class GitPushCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commit changed files and push them to the repository';

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
     * @return int
     * @throws GitException
     */
    public function handle()
    {
        $git = new Git();
        $repo = $git->open(base_path());
        if ($repo->hasChanges()) {
            $this->info("Pushing change to Github repo ...");
            $this->line("Uncommitted files detected ...");
            $repo->addAllChanges();
            $this->line("committing files ...");
            $message = $this->ask("Please enter a commit message", 'wip');
            $repo->commit($message);
            $this->info("Pushing to master branch !");
            $repo->push('origin', ['master']);
            $this->info("Changes pushed !!");
        }

        return 0;
    }
}
