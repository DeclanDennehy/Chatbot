<?php
    /*
     *  Function to send a search request to the SWAPI and then send the results in a chatfuel compatabile format
     *  If no results are given say no results were found and then try again.
     */
    function person_query(){
        $search = $_GET["query_person"];
        // format the string to allow form multiple words
        $search = str_replace("%20", ",", $search);
        $search = str_replace(" ",",",$search);
        // send the request to API and then convert it into a PHP array
        $results = json_decode(file_get_contents("https://swapi.co/api/people?search=".$search),TRUE);
        // get the number of results
        $count = $results["count"];
        if ($count > 0){
            // build start of message
            $message = '{"messages": [{"text":  "Who are you interested in?","quick_replies": ['; 
            // loop through all results except the last and add their contents to the message
            for($i = 0; ($i < $count-1 && $i < 9); $i++){
                $message .= '{"title":"'.$results["results"][$i]["name"].'","block_names":["Person"],"set_attributes": {"person_chosen": "'.$results["results"][$i]["url"].'"}},';
            }
            // add the contents of the last result and end the message. 
            $message .= '{"title":"'.$results["results"][$i]["name"].'","block_names":["Person"],"set_attributes": {"person_chosen": "'.$results["results"][$i]["url"].'"}}]}]}';
        } else {       
            // no results are found so indicate that to user and retry
            $message = '{"messages": [{"text": "No results are found"}],"redirect_to_blocks": ["Query Person"]}';
        }
        // send the message to the chatbot 
        echo $message;
        return;
    }
    /*
     *  Function to send a request for a person page to the SWAPI and then return a description to the chatbot
     */
    function person_description(){
        // send the request to the API and decode the results to a PHP array
        $results = json_decode(file_get_contents($_GET["url_person"]),TRUE);
        // since the homeworld attribute is a page in the API we need to make another call to retrieve the name of it
        $homeworld = json_decode(file_get_contents($results["homeworld"]),TRUE);
        // create a message giving various details and send it to the chatbot
        echo '{"messages": [{"text": "Name: '.$results["name"].',\\nGender: '.$results["gender"].',\\nHeight: '.$results["height"].'cm,\\nWeight '.$results["mass"].'kg,\\nHomeworld: '.$homeworld["name"].'"}]}';
        return;
    }
?>