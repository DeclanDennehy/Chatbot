<?php
    // handle person querys
    if(isset($_GET["q"])){
        // untested BEGIN
        
        $results = json_decode(file_get_contents("https://swapi.co/api/people?search=".$_GET["q"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "Who are you interested in?","quick_replies": ['; 
        
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["person"],
                  "set_attributes": {"person_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["person"],
                  "set_attributes": {"person_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    // handle urls
    if(isset($_GET["url"])){
        $results = json_decode(file_get_contents($_GET["url"]),TRUE);
        $homeworld = json_decode(file_get_contents($results["homeworld"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\n Gender: '.$results["gender"].',\\n Height: '.$results["height"].'cm,\\n Weight '.$results["mass"].'kg,\\n Homeworld: '.$homeworld["name"].'"}]}';
    }
?>