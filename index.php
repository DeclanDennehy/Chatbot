<?php
    $search = $_GET["q"];
    if ($search != ""){
        echo '{"messages": [{"text": "Welcome to our store!"},{"text": "How can I help you?"}]}';
    } else {
        echo '{"messages": [{"text": "No response found!"}]}';
    }
?>