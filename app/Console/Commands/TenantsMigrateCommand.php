<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class TenantsMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {tenant?} {--fresh} {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Migration Command for Tenants';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->argument('tenant')) {
            $this->migrate(
                Tenant::find($this->argument('tenant'))
            );
        } else {
            Tenant::all()->each(
                fn($tenant) => $this->migrate($tenant)
            );
        }
    }

    public function migrate($tenant) {
        
        $tenant->configure()->use();
        
        $this->line('');
        $this->line("--------------------------------------");
        $this->info("Migrating Tenant #{$tenant->id} ({$tenant->name})");
        $this->line("--------------------------------------");

        $options = ['--force' => true];

        if($this->option('seed')) {
            $options['--seed'] = true;
        }

        $this->call(
            $this->option('fresh') ? 'migrate:fresh' : 'migrate',
            $options
        );
    }
}
