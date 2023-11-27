<?php

namespace App\Http\Controllers;

header("Access-Control-Allow-Origin: *");

use Illuminate\Http\Request;

class paymentController extends Controller
{


    public function makePayment(Request $request)
    {

        $json = file_get_contents('php://input');

        // Converts it into a PHP object
        $data = json_decode($json);

        $transactionId = $data->transactionId;
        $status = $data->status;



        //array_push($data, $request->statusDescription);

        return $json;
    }
}
