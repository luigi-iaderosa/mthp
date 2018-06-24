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

    public function popLogs(Request $request,PopLogsHelper $popLogsHelper){

        $popLogsHelper->help(10);



    }




    public function fillAll(Request $request,GuzzleHttp\Client $client){





        
        /**
         * follows configuration found at
         * https://laravelcode.com/post/laravel-55-how-to-make-curl-http-request-example
         */

        $url = 'http://mthp.local/api/pop-logs';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST , "POST");
        curl_setopt($ch,CURLOPT_TIMEOUT,30000);

        $output = curl_exec ($ch);
        $info = curl_getinfo($ch);
        $http_result = $info;
        curl_close ($ch);


        return  json_encode($http_result);


    }

}