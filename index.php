<?php
    $search = $_GET["q"];
    // create empty response to be added to
    $message = "";
    
    // empty query check, note that this should never actually occur since we are just using facebook messenger which handles that on their end
    if ($search != ""){
        // send request to API
        $response_json = file_get_contents("http://swapi.co/api/people/?search=".$search);
        $response_parsed = json_decode($response_json, TRUE);
        
        $count = $response_parsed["count"];
        
        if ($count > 0){
            $message += '{"messages": [';
            // add note to show how many are found only show max of 5 to prevent spamming
            if ($count < 5){
                $message += '{"text": "Found "'.$count.'"},';
            }
            else {
                $message += '{"text": "Found '.$count.', showing 5"},';
            }
            
            // for every result up to 5
            for($i = 0; ($i < $count && $i < 5); $i++){
                $message += '{"text": "Name: '.$count = $response_parsed["results"][$i]["name"].'\\n';
                $message += 'Year of Birth: '.$count = $response_parsed["results"][$i]["birth_year"].'\\n';
                $homeplanet_request = json_decode(file_get_contents($response_parsed["results"][$i]["homeworld"]),TRUE);
                $message += 'Homeworld: '.$homeplanet_request["name"].'\\n';
                $species_request = json_decode(file_get_contents($response_parsed["results"][$i]["species"]),TRUE);
                $message += 'Species: '.$species_request["name"].'\\n';
                $message += '"},';
            }
            
            // remove the last comma added by the for loop
            $message = substr($message,0,-1);
            $message += ']}';
        } else{
            $message += '{"messages": [{"text": "No response found!"}]}'; 
        }
    } else {
        $message += '{"messages": [{"text": "No response found!"}]}';
    }
    echo $message;
?>