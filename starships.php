<?php
    function starships_query(){
        $results = json_decode(file_get_contents("https://swapi.co/api/starships?search=".$_GET["query_starships"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "What ships are you interested in?","quick_replies": ['; 
        
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Starship"],
                  "set_attributes": {"starship_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Starship"],
                  "set_attributes": {"starship_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    function starship_description(){
        $results = json_decode(file_get_contents($_GET["url_starship"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nGender: '.$results["gender"].',\\nHeight: '.$results["height"].'cm,\\nWeight '.$results["mass"].'kg,\\nHomeworld: '.$homeworld["name"].'"}]}';
    }
?>