<?php
    // retrive the only GET attribute
    $get_attribute = array_keys($_GET)[0];
    // swtich statement to check the key of GET attribute and then execute the corresponding function
    // include statements are done seperaely in each case so that files are only included when necessary
    switch ($get_attribute){            
        // search for a person and send the results to the chatbot
        case "query_person":
            include 'person.php';
            person_query();
            break;
        // get the description of a person and send the results to the chatbot
        case "url_person":
            include 'person.php';
            person_description();
            break;
        // search for a planet and send the results to the chatbot
        case "query_planet":
            include 'planet.php';
            planet_query();
            break;
        // get the description of a planet and send the results to the chatbot
        case "url_planet":
            include 'planet.php';
            planet_description();
            break;
        // search for a species and send the results to the chatbot
        case "query_species":
            include 'species.php';
            species_query();
            break;
        // get the description of a species and send the results to the chatbot
        case "url_species":
            include 'species.php';
            species_description();
            break;
        // search for a starship and send the results to the chatbot
        case "query_starships":
            include 'starships.php';
            starships_query();
            break;
        // get the description of a starship and send the results to the chatbot
        case "url_starships":
            include 'starships.php';
            starship_description();
            break;
        // search for a vehicle and send the results to the chatbot
        case "query_vehicles":
            include 'vehicles.php';
            vehicles_query();
            break;
        // get the description of a vehicle and send the results to the chatbot
        case "url_vehicles":
            include 'vehicles.php';
            vehicle_description();
            break;
        // search for a film and send the results to the chatbot
        case "query_films":
            include 'films.php';
            films_query();
            break;
        // get the description of a film and send the results to the chatbot
        case "url_films":
            include 'films.php';
            film_description();
            break;
        // in the default case then return with a issue message - note that due to being sent to  
        // the chatbot directly a friendly essentially useless message is sent
        default:
            echo '{"messages":[{"text": "Oops! Something has gone wrong with the server!"}]}';
            break;
    }
?>