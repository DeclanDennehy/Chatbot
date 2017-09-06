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
        $crawl = $results["opening_crawl"];
        str_replace("\r\n","\\n",$crawl);
        echo '{"messages": [{"text": "Title: '.$results["title"].',\\nEpisode Number: '.$results["episode_id"].',\\nDate of Release: '.$results["release_date"].',\\nDirector: '.$results["director"].'\\n'.$crawl.'"}]}';
    }
?>