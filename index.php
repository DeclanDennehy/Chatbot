<?php
    if(isset($_GET["q"])){
        echo '
        {"messages":[
            {"text": "No query was given!"}
        ]}';
    }
    else{
        echo '
        {
            "messages":[
                {"text": "No query was given!"}
            ]
        }';
    }
?>