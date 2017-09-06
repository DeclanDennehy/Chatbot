<?php
    function species_query(){
        $results = json_decode(file_get_contents("https://swapi.co/api/species?search=".$_GET["query_species"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "What species are you interested in?","quick_replies": ['; 
        
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Species"],
                  "set_attributes": {"species_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Species"],
                  "set_attributes": {"Species_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    function species_description(){
        $results = json_decode(file_get_contents($_GET["url_species"]),TRUE);
        $homeworld = json_decode(file_get_contents($_GET["url_species"]["homeworld"]),TRUE);
        
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nClassification: '.$results["classification"].',\\nAverage Height: '.$results["average_height"].'cm,\\nAverage Lifespan '.$results["average_lifespan"].'years,\\nHomeworld: '.$homeworld["name"].',\\nLanguage: '.$results["language"].'"}]}';
    }
?>