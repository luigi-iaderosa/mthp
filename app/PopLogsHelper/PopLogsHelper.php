<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 24/06/18
 * Time: 12.23
 */

namespace App\PopLogsHelper;
use App\Models\DailyPoolLogEntry;

class PopLogsHelper
{
    private $styles = ['crawl','breast','back','butterfly'];
    private $distances = [50,100,150,200,400];
    private $logs = [31,36,37];
    public function help($nElements){
        for($i=0; $i<$nElements; $i++){

            $attributes['style'] = $this->assignRandomStyle();
            $attributes['with_fins'] = $this->assignBooleanValue();
            $attributes['with_paddles'] = $this->assignBooleanValue();
            $attributes['distance'] = $this->assignRandomDistance();
            $attributes['daily_log_id'] = $this->assignRandomLogParent();
            DailyPoolLogEntry::create($attributes);
        }
    }

    private function assignRandomStyle (){

        $seed = rand(0,3);
        return $this->styles[$seed];

    }

    private function assignBooleanValue(){
        $seed = rand(0,1);
        return $seed == 1;
    }

    private function assignRandomDistance(){
        $seed = rand(0,4);
        return $this->distances[$seed];
    }


    private function assignRandomLogParent(){
        $seed = rand(0,2);
        return $this->logs[$seed];
    }





}