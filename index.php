<?php
    $search = $_GET["q"];
    if ($search != ""){
        $response_json = file_get_contents("http://swapi.co/api/people/?search=".$search);
        $response_parsed = json_decode($response_json, TRUE);
        echo '{
  "messages": [
    {"text": "Found '.$response_parsed["count"].' possibilities"},
    {
      "attachment": {
        "type": "template",
        "payload": {
          "template_type": "button",
          "text": "Hello!",
          "buttons": [
            {
              "type": "show_block",
              "block_name": "some block name",
              "title": "Show the block!"
            }
          ]
        }
      }
    }
  ]
}';
        
    } else {
        echo '{"messages": [{"text": "No response found!"}]}';
    }
?>