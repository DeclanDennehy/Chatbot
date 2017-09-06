<?php
    $search = $_GET["q"];
    if ($search != ""){
        echo '{"messages":[
            {"text: "You searched for'.$search.'"}
        ]}';
    } else {
        echo "empty response";
    }
?>