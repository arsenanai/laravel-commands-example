<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\NewKato;
use App\OldKato;
use Illuminate\Support\Facades\DB;

class SynchronizeKatos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kato:synchronize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command merges two tables of kato';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach(array('kk','ru') as $l){
            $affected = DB::update("
update old_katos
set ($l, full_$l, updated) = (nk.$l, replace(full_$l,old_katos.$l,nk.$l), true)
from new_katos nk
where
nk.code = old_katos.code and nk.$l != old_katos.$l
                ");
            echo 'updated rows: '.$affected."\n";
        }
        $deleted = OldKato::leftJoin('new_katos','new_katos.code','=','old_katos.code')
            ->where('old_katos.deleted',false)
            ->where('old_katos.code','!=','999999999')
            ->whereNull('new_katos.code')
            ->update(['old.katos.deleted'=>true]);
        echo 'marked as deleted: '.$deleted."\n";
    }
}
