<?php
    function films_query(){
        $results = json_decode(file_get_contents("https://swapi.co/api/films?search=".$_GET["query_films"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "What film are you interested in?","quick_replies": ['; 
        
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["title"].'",
                  "block_names":["Film"],
                  "set_attributes": {"film_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["title"].'",
                  "block_names":["Film"],
                  "set_attributes": {"film_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    function film_description(){
        $results = json_decode(file_get_contents($_GET["url_films"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nGender: '.$results["gender"].',\\nHeight: '.$results["height"].'cm,\\nWeight '.$results["mass"].'kg,\\nHomeworld: '.$homeworld["name"].'"}]}';
    }
?>