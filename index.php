<?php
    // handle querys
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
    else{
        echo RESPONSE_START.TEXT_START.'No query was given!'.TEXT_END.RESPONSE_END;
        return;
    }

    // handle urls
    if(isset($_GET["url"])){
        $results = json_decode(file_get_contents($_GET["url"]),TRUE);
        echo '{"messages":[{"text": $results["name"]}]';
    }
?>