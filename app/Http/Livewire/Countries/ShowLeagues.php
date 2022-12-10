<?php

namespace App\Http\Livewire\Countries;

use Livewire\Component;

class ShowLeagues extends Component
{

    protected $listeners = [
        'Country',
    ];

    public array $leaguesOfThisCountry;

    public function mount()
    {
        $curl = curl_init();


        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://v3.football.api-sports.io/leagues?code=PT',
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
     
       

        $leaguesOfThisCountry = json_decode($response,true);
        
        $this->leaguesOfThisCountry = $leaguesOfThisCountry["response"];

    }

    public function Country($id)
    {
       
        $curl = curl_init();


        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://v3.football.api-sports.io/leagues?code='.$id,
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
     
       

        $leaguesOfThisCountry = json_decode($response,true);

        $this->leaguesOfThisCountry = $leaguesOfThisCountry["response"];

        
    }
    
    public function render()
    {
             
       return view('livewire.countries.show',["leaguesOfThisCountry" => $this->leaguesOfThisCountry ]);
    }
}
