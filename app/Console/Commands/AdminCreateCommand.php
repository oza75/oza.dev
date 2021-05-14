<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

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
     */
    public function handle()
    {
        do {
            $name = $this->ask('Nom complet');
        } while (empty($name));

        do {
            $email = $this->ask('Adresse email');
        } while (empty($email));

        do {
            $password = $this->ask('Mot de passe');
        } while (empty($password));

        $attributes = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => 1,
            'email_verified_at' => now()
        ];

        /** @var User $user */
        $user = User::query()->create($attributes);

        $this->info("Le compte administrateur a été créé !");

        return 0;
    }
}
