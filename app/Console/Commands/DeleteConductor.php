<?php

namespace Proyectox\Console\Commands;

use Illuminate\Console\Command;

class DeleteConductor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'conductor:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nooo no se llamaa';

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
        Conductor::where('condicion',1)->delete();
    }
}
