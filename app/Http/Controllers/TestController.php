<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 24/06/18
 * Time: 11.58
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\PopLogsHelper\PopLogsHelper;
use GuzzleHttp;
class TestController extends Controller {

    private $responses = [];
    public function popLogs(Request $request,PopLogsHelper $popLogsHelper){

        $popLogsHelper->help(10);



    }




    public function fillAll(Request $request){



        /**
         *
         * GUZZLE
         *
         * follows configuration found at
         * https://github.com/guzzle/guzzle
         */

        $gClient = new GuzzleHttp\Client();




        $url = 'http://mthp.local/api/pop-logs';
        $fillElementFactor  = 10;





        // Send an asynchronous request.
        $guzzleRequest = new \GuzzleHttp\Psr7\Request('POST', $url);


        $promises = [];
        foreach (range(0,$fillElementFactor) as $x){
            $promise = $gClient->sendAsync($guzzleRequest)->then(function ($response) {
               array_push($this->responses,$response);
            });
            $promise->wait();
        }

        return  "all invoked";







    }

}