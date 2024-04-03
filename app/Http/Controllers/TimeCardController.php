<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeCard; 

class TimeCardController extends Controller
{



    public function getRequest($endpoint = '', $query = [])
{
    $client = new \GuzzleHttp\Client();

    $base_url = 'https://fa-exyn-test-saasfaprod1.fa.ocs.oraclecloud.com/';
    $url = $base_url . $endpoint;
    $username = 'Amr.Hossam@crystal-cs.com';
    $password = '01208588959';


    try {
        $response = $client->get($url, [
            'auth' => [$username, $password],
            'query' => $query
        ]);

        if ($response->getStatusCode() == 200) {
            $responseData = json_decode($response->getBody()->getContents());
            return $responseData;
        } else {
            throw new \Exception('Failed to retrieve data. Status code: ' . $response->getStatusCode());
        }
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        throw new \Exception('Request Exception: ' . $e->getMessage());
    }
}


public function getTimeCard()
{
    
    
    ini_set('max_execution_time', 3600); // Set maximum execution time to 1 hour

    $endpoint = '/hcmRestApi/resources/11.13.18.05/timeCardsLOV';
    $limit = 500;
    $offset = 0;

    $data = $this->getRequest($endpoint . '?limit=' . $limit . '&offset=' . $offset);
    // $data = json_decode($this->getRequest()->getbody->getContents());

    
    $jsonData = json_encode($data);


    file_put_contents('ٍTimeCard_data.json', $jsonData);
    // dd($data);
    foreach ($data->items as $item) {
        TimeCard::updateOrCreate([
            'timeRecordGroupId' => $item->timeRecordGroupId,
            'startTime' => $item->startTime,
            'stopTime' => $item->stopTime,
            'startDate' => $item->startDate,
            'stopDate' => $item->stopDate,
            

        ]);
    }

    return view('showTimeCard', compact('data'));
}




}
