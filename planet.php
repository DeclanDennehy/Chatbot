<?php
    function planet_query(){
        $results = json_decode(file_get_contents("https://swapi.co/api/planets?search=".$_GET["query_planet"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "What are you interested in?","quick_replies": ['; 
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Planet"],
                  "set_attributes": {"planet_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Planet"],
                  "set_attributes": {"planet_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    function planet_description(){
        $results = json_decode(file_get_contents($_GET["url_planet"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nDiameter: '.$results["diameter"].',\\nClimate: '.$results["climate"].',\\nTerrain '.$results["terrain"].',\\nPopulation: '.results["population"].'"}]}';
    }
?>