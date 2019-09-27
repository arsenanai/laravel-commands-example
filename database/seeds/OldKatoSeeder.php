<?php

use Illuminate\Database\Seeder;
use App\OldKato;

class OldKatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//id^code^kk^ru^full_kk^full_ru^has_child^parent_id
    	DB::beginTransaction();
    	$counter=0;
    	$success = true;
    	$exceptions = 0;
        foreach(file(base_path('database/seeds/katoold.csv')) as $line) {
        	//try{
    		$c = explode('^',$line);
    		$k = new OldKato();
    		$k->id = intval($c[0]);
    		$k->code = $c[1];
    		$k->kk = $c[2];
    		$k->ru = $c[3]; 
    		$k->full_kk = $c[4];
    		$k->full_ru = $c[5];
    		$k->has_child = $c[6]=='True'?true:false;
    		$k->parent_id = $c[7]=='NULL'?null:intval($c[7]);
    		$k->deleted = false;
    		$k->updated = false;
    		$k->save();
    		$success = true;
    		$counter++;
   //  		}catch (\Exception $e) {
			//    $success = false;
			//    $exceptions++;
			// }
			// if($success == false)
			// 	DB::rollback();
			if($counter>=1000){
				$counter=0;
    			DB::commit();
    		}
		}
		DB::commit();
		//echo " exceptions: ".$exceptions." \n";
    }
}
