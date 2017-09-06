<?php
    $search = $_GET["q"];
    if ($search != ""){
        $response_json = file_get_contents("http://swapi.co/api/people/?search=".$search);
        $response_parsed = json_decode($response_json, TRUE);
        $name = $response_parsed["results"][0]["name"];
        $yob = $response_parsed["results"][0]["birth_year"];
        $species = $response_parsed["results"][0]["species"][0];
        $homeworld = $response_parsed["results"][0]["homeworld"];
        $films = implode(',',$response_parsed["results"][0]["films"]);
        echo '{
  "messages": [
    {"text": "Found '.$response_parsed["count"].' possibilities"},
    {"text": "
        Name: '.$name.'\n
        Year of Birth: '.$yob.'\n
        Species: '.$species.'
        Homeworld: '.$homeworld.'
        Appears in: '.$films.'
    "} 
  ]
}';
        
    } else {
        echo '{"messages": [{"text": "No response found!"}]}';
    }
?>