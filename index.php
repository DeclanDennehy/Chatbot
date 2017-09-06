<?php
    // handle person querys
    if(isset($_GET["query_person"])){
        include 'person.php';
        person_query();
        return;
    }

    // handle person urls
    if(isset($_GET["url_person"])){
        include 'person.php';
        person_description();
        return;
    }



    // handle planet querys
    if(isset($_GET["query_planet"])){
        include 'planet.php';
        planet_query();
        return;
    }

    // handle planet urls
    if(isset($_GET["url_planet"])){
        include 'planet.php';
        planet_description();
        return;
    }



     // handle species querys
    if(isset($_GET["query_species"])){
        include 'species.php';
        species_query();
        return;
    }

    // handle species urls
    if(isset($_GET["url_species"])){
        include 'species.php';
        species_description();
        return;
    }



    // handle species starship querys
    if(isset($_GET["query_starships"])){
        include 'starships.php';
        starships_query();
        return;
    }
    
    // handle species starship querys
    if(isset($_GET["url_starships"])){
        include 'starships.php';
        starship_description();
        return;
    }



    // handle species vehicle querys
    if(isset($_GET["query_vehicles"])){
        include 'vehicles.php';
        vehicles_query();
        return;
    }
    
    // handle species vehicle querys
    if(isset($_GET["url_vehicles"])){
        include 'vehicles.php';
        vehicle_description();
        return;
    }



    // handle species films querys
    if(isset($_GET["query_films"])){
        include 'films.php';
        films_query();
        return;
    }

    // handle species films querys
    if(isset($_GET["url_films"])){
        include 'films.php';
        film_description();
        return;
    }
?>