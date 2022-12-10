<?php

namespace App\Http\Controllers\Countries;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CountriesController extends Controller
{
   
    /**
     * Display the countries list.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
               
        $curl = curl_init();


        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://v3.football.api-sports.io/countries',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'x-rapidapi-key: 17b1c5a9f1a900a69c70e9d6130de6dd',
            'x-rapidapi-host: v3.football.api-sports.io'
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl); 
     

        $countries = json_decode($response,true);
     
    
        return view('countries.index',compact('countries'));
    }


}