<?php
    function vehicles_query(){
        $results = json_decode(file_get_contents("https://swapi.co/api/vehicles?search=".$_GET["query_vehicles"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "Who are you interested in?","quick_replies": ['; 
        
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Vehicle"],
                  "set_attributes": {"vehicle_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Vehicle"],
                  "set_attributes": {"vehicle_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    function vehicle_description(){
        $results = json_decode(file_get_contents($_GET["url_vehicles"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nModel: '.$results["model"].',\\nManufacturer: '.$results["manufacturer"].',\\nCost:  '.$results["cost_in_credits"].' credits,\\nCrew: '.$results["crew"].' people,\\nPassengers: '.$results["passengers"].' people,\\nClass: '.$results["vehicle_class"].'"}]}';
    }
?>