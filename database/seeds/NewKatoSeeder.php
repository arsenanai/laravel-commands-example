<?php

use Illuminate\Database\Seeder;
use App\NewKato;

class NewKatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::beginTransaction();
    	$counter=0;
    	$success = true;
    	$exceptions = 0;
        foreach(file(base_path('database/seeds/katonew.csv')) as $line) {
    		$c = explode('^',$line);
    		$k = new NewKato();
    		$k->code = $c[0];
    		$k->ab = $c[1];
    		$k->cd = $c[2];
    		$k->ef = $c[3];
    		$k->hij = $c[4]; 
    		$k->k = $c[5];
    		$k->kk = $c[6];
    		$k->ru = $c[7];
    		$k->nn = strlen($c[8])>1? $c[8]: null;
    		$k->save();
    		$success = true;
    		$counter++;
			if($counter>=1000){
			 	$counter=0;
    			DB::commit();
    		}
		}
		DB::commit();
    }
}
