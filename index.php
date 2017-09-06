<?php
    const RESPONSE_START = '{"messages": [';
    const RESPONSE_END = ']}';
    const TEXT_START = '{"text": "';
    const TEXT_END_COMMA = '"},';
    const TEXT_END = '"}';

    if(isset($_GET["q"])){
        // untested BEGIN
        
        $results = json_decode(file_get_contents("https://swapi.co/api/people?search=".$_GET["q"]),TRUE);
        $count = $results["count"];
        $message = RESPONSE_START;
        for($i = 0; ($i < $count-1 && $i < 9); $i++){
            $message .= TEXT_START;
            $message .= $results["results"][$i]["name"];
            $message .= TEXT_END_COMMA;
        }
        $message .= TEXT_START;
        $message .= $results["results"][$i]["name"];
        $message .= TEXT_END;
        $message .= RESPONSE_END;
        //echo $message;
        echo '{
  "messages": [
    {
      "text":  "Who are you interested in?",
      "quick_replies": [
        {
          "title":"'.$results["results"][0]["name"].'",
          "block_names":["person"]
          "set_attributes": {"person_chosen": "'.$results["results"][0]["url"].'"}
        },
        {
          "title":"'.$results["results"][1]["name"].'",
          "block_names":["person"]
          "set_attributes": {"person_chosen": "'.$results["results"][1]["url"].'"}
        }
      ]
    }
  ]
}';
    }
    else{
        echo RESPONSE_START.TEXT_START.'No query was given!'.TEXT_END.RESPONSE_END;
    }
?>