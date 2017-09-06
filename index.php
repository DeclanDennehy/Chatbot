<?php
    // handle person querys
    if(isset($_GET["query_person"])){
        // untested BEGIN
        
        $results = json_decode(file_get_contents("https://swapi.co/api/people?search=".$_GET["q"]),TRUE);
        $count = $results["count"];
        $message = '{"messages": [{"text":  "Who are you interested in?","quick_replies": ['; 
        
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Person"],
                  "set_attributes": {"person_chosen": "'.$results["results"][$i]["url"].'"}
                },';
        }
        $message .= '{
                  "title":"'.$results["results"][$i]["name"].'",
                  "block_names":["Person"],
                  "set_attributes": {"person_chosen": "'.$results["results"][$i]["url"].'"}
                }]
        }]}';
        echo $message;
        return;
    }

    // handle person urls
    if(isset($_GET["url_person"])){
        $results = json_decode(file_get_contents($_GET["url_person"]),TRUE);
        $homeworld = json_decode(file_get_contents($results["homeworld"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nGender: '.$results["gender"].',\\nHeight: '.$results["height"].'cm,\\nWeight '.$results["mass"].'kg,\\nHomeworld: '.$homeworld["name"].'"}]}';
    }


    // handle planet querys
    if(isset($_GET["query_planet"])){
        $results = json_decode(file_get_contents("https://swapi.co/api/planets?search=".$_GET["q"]),TRUE);
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

    // handle planet urls
    if(isset($_GET["url_planet"])){
        $results = json_decode(file_get_contents($_GET["url_planet"]),TRUE);
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nDiameter: '.$results["diameter"].',\\nClimate: '.$results["climate"].',\\nTerrain '.$results["terrain"].',\\nPopulation: '.$homeworld["population"].' inhabitants"}]}';
    }
?>