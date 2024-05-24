<?php

/*
<iframe style="border:0; height:450px; width: 100%;" allowfullscreen="" loading="lazy" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD4iE2xVSpkLLOXoyqT-RuPwURN3ddScAI&amp;q=Bäcklösavägen+4c,Uppsala+se">
</iframe>
*/



function _genBaseUrl($type = "place") {
    $API_KEY = "AIzaSyBkRnQBGqn9XMttZdimSjtByTpBWUdkcXM";
    $BASE_URL = "https://www.google.com/maps/embed/v1/" . $type . "?key=" . $API_KEY;
    return $BASE_URL;
}



function _genBasicMapUrl($addy) {
    $BASE_URL = _genBaseUrl();
    return $BASE_URL . "&q=" . urlencode($addy);
}

function _genDirectionsMapUrl($from, $to) {
    $BASE_URL = _genBaseUrl("directions");
    return $BASE_URL . "&origin=" . urlencode($from) . "&destination=" . urlencode($to);
}

function _generateMap($url, $id = "map") {
    echo "<iframe id=\"" . $id . "\" style=\"border:0; height: 450px; width: 100%;\" allowfullscreen=\"\" loading=\"lazy\" src=\"" . $url . "\">";
    echo "your browser does not support iframes";
    echo "</iframe>";
}

function generateBasicMap($address) {
    $url = _genBasicMapUrl($address);
    _generateMap($url);
}

function generateDirectionsMap($from, $to) {
    $url = _genDirectionsMapUrl($from, $to);
    _generateMap($url);
}

function generateDynamicMap($to) {
    $url = _genBasicMapUrl($to);

    if(isset($_GET["fromLat"]) && isset($_GET["fromLon"])) {
        $lat = $_GET["fromLat"];
        $lon = $_GET["fromLon"];

        $url = _genDirectionsMapUrl($lat . "," . $lon, $to);
    } else {
        echo "<script src=\"/js/dynamicMap.js\"> </script>";
    }
    
    _generateMap($url, "dynmapIframe");
}

/*
    exempel:
        generateBasicMap("Ekonomikum, uppsala")                                     -> Du får en karta med ekonomikum i mitten
        generateDirectionsMap("Bäcklösavägen 4c, Uppsala", "Marsgatan 14, Sala")    -> Du får en vägbeskrivning från min lägenhet till min farsas hus

        generateDynamicMap("Kungliga slottet, Stockholm")                           
            Du får först en basicMap (platsen utan vägbeskrivning) men en javascriptfil läggs också till som frågar användaren om vi kan få positionen från enheten.
            Om svaret är ett ja så laddas sidan om med parametrarna fromLat och fromLon som innehåller enhetens longitud och latitud. generateDynamicMap kommer då använda
            dessa värden för att returnera en directionsMap. 


*/