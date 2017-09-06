<?php
    if(isset($_GET["q"])){
        // untested BEGIN
        
        $results = json_decode(file_get_contents("https://swapi.co/api/people?search=".$_GET["q"]),TRUE);
        echo '{"messages":[{"text": "Found '.$results["count"].' result(s)!"}]}';
        echo '{"messages":[{"text": "More info?"}]}';
        // untested END
    }
    else{
        echo '{"messages":[{"text": "No query was given!"}]}';
    }
?>