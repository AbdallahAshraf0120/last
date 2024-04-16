<?php

namespace App\Http\Controllers;

use App\Models\AbsenceRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\TimeCard;
use App\Models\TimeMachine;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Session\flash;

class ApiController extends Controller
{

    public function getRequest($endpoint = '', $query)
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

    // Check if any data exists in the TimeCard table
    if (TimeCard::count() == 0) {
        do {
            $query = [
                'limit'=> $limit ,
                'offset' => $offset
            ];
            $data = $this->getRequest($endpoint , $query);
            foreach ($data->items as $item) {
                TimeCard::insertOrIgnore([
                    'timeRecordGroupId' => $item->timeRecordGroupId,
                    'startTime' => $item->startTime,
                    'stopTime' => $item->stopTime,
                    'startDate' => $item->startDate,
                    'stopDate' => $item->stopDate,
                ]);
            }
            $offset += $limit;  
        } while ($data->hasMore);
    }
}


    
public function showTimeCardData(){
    $timeCards = TimeCard::all();
    return view('showTimeCard', ['data' => $timeCards]);

    
}
    



    
public function getemployee()
{
    ini_set('max_execution_time', 3600); 

    $endpoint = '/hcmRestApi/resources/11.13.18.05/emps';
    $limit = 500;
    $offset = 0;

    // Check if any data exists in the Employee table
    if (Employee::count() == 0) {
        do {
            $query = [
                'limit'=> $limit ,
                'offset' => $offset
            ];
            $data = $this->getRequest($endpoint , $query);
            foreach ($data->items as $item) {
                Employee::insertOrIgnore([
                    'FirstName' => $item->FirstName,
                    'LastName' => $item->LastName,
                    'NationalId' => $item->NationalId,
                    'WorkEmail' => $item->WorkEmail,
                ]);
            }
            $offset += $limit;  
        } while ($data->hasMore);
    }
}




public function showEmplyeeData(){
    $employee = Employee::all();
   // dd($employee);
    return view('employee', ['data' => $employee]);

    
}


public function getTimeMachine()
{
    ini_set('max_execution_time', 3600); 
    
    $endpoint = '/hcmRestApi/resources/11.13.18.05/timeRecords';
    $limit = 500;
    $offset = 0;
    $totalRecords = 0;

    // Check if any data exists in the TimeMachine table
    if (TimeMachine::count() == 0) {
        do {
            $query = [
                'limit'=> $limit ,
                'offset' => $offset
            ];
            $data = $this->getRequest($endpoint , $query);
            foreach ($data->items as $item) {
                TimeMachine::insertOrIgnore([
                    'timeRecordId' => $item->timeRecordId,
                    'timeRecordGroupId' => $item->timeRecordGroupId,
                    'startTime' => $item->startTime,
                    'stopTime' => $item->stopTime,
                    'personId' => $item->personId,
                ]);
                $totalRecords++;

                // Check if the total number of records fetched is equal to or greater than 1000
                if ($totalRecords >= 1000) {
                    return; // Exit the function once 1000 records are fetched
                }
            }
            $offset += $limit;  
        } while ($data->hasMore);
    }
}



public function showTimeMchine(){
    $TimeMachine = TimeMachine::all();
    return view('showTimeMachine', ['data' => $TimeMachine]);

    
}

public function RunGetgetTimeCard()
{
    $this->getTimeCard();
    return redirect()->back()->with('success', 'TimeCard integration process executed successfully.');
}

public function RunGetEmployee()
{
    $this->getemployee(); 
    return redirect()->back()->with('success', 'Employee integration process executed successfully.');
}



public function RunGetTimemeMachine()
{
    $this->getTimeMachine(); 
    return redirect()->back()->with('success', 'TimeMachine integration process executed successfully.');
}




}

















