<?php
// https://v6.exchangerate-api.com/v6/d2917e2db596e64852ebcbc2/latest/SEK

// Okok denna rad ser lite tokig ut men den är ganska simpel
// allt den gör är att kolla vart vi kan lägga det cachade svaret från APIn.
// Om linux:
//      Kolla om /dev/shm/ existerar ("fake-mapp" där alla filler är på RAM minnet)
//      Om denna mapp finns så sparar vi svaret från APIn här. Annars aparar vi i tmp mappen
// Om windows:
//      spara filen i %temp% mappen

$PATH = (PHP_OS_FAMILY == "Linux" ? ( file_exists("/dev/shm/") ? "/dev/shm/" : "/tmp/" ) : "%temp%/") . "php_proj_curr.tmp";

// Denna funktion ser till att vi lagrar den "Nyaste" informationen från APIn i minnet istället för att hämta den varje gång.
// Detta kanske inte är superviktigt för oss men den ser till att vi inte överstiger 1.5k requests till APIn vilket är våran gräns.
function cacheAccess() {
    global $PATH;

    if(file_exists($PATH)) {
        $cache = json_decode(file_get_contents($PATH), true);

        if(!isset($cache)) return null;

        if($cache["time_next_update_unix"] < time()) {
            // cache object ttl expired
            return null;
        } else {
            return $cache;
        }
    } 

    return null;
}

// Denna funktion kallar på apin och returnerar svaret som en associative array
function makeApiReq() {
    $d = file_get_contents("https://v6.exchangerate-api.com/v6/d2917e2db596e64852ebcbc2/latest/SEK");
    return json_decode($d, true);
}

// Denna funktion kollar om vi redan har datan i cache. Om det redan finns i cache så returnerar vi lagrad data annars hämtar vi ny 
function getData() {
    global $PATH;
    $data = cacheAccess();

    if($data) {
        return $data;
    } else {
        $data = makeApiReq();

        file_put_contents($PATH, json_encode($data));

        return $data;
    }
}

// Denna funktion returnerar en lista med valbara currencies
function getValidCurrencies() {
    return array_keys(getData()["conversion_rates"]);
}

function getCurrencySymbol($cur) {
    $symbols = [
        "USD" => "$",
        "EUR" => "€",
        "GBP" => "£",
        "UAH" => "₴",
        "ZWD" => "Z$",
        "THB" => "฿",
        "RUB" => "₽",
        "NGN" => "₦",
        "MXN" => "$"
    ];

    if(isset($symbols[$cur])) {
        return $symbols[$cur];
    } else {
        return $cur;
    }
}

// Denna funktion är den som faktiskt konverterar valutan. Den tar ett argument ($amntSek) som då är priset i kronor och valutan vi vill konvertera till ($to) och returnerar svaret
// $round (default= true) kapar av nummrets decimaler så vi får 0.21 ist för 0.213123123 vilket kan vara jobbigt
function convertCurrency($amntSek, $to, $round = true) {
    $data = getData();

    if(!(gettype($amntSek) == "integer" || gettype($amntSek) == "double") || gettype($to) != "string") {
        throw new Exception("Argument types not okidoki :(");
    }

    if(!isset($data["conversion_rates"][$to])) {
        throw new Exception("currency \"" . $to . "\" not valid.");
    }

    $calc = $amntSek * $data["conversion_rates"][$to];

    return ($round ? round($calc, 2) : $calc) . getCurrencySymbol($to);
}

/*
    Exempel:
        convertCurrency(10, "USD")          ->  0.93$
        convertCurrency(10, "USD", false)   ->  0.9339$ 
        convertCurrency("10", "USD")        ->  Exception: Argument types not okidoki :( ($amntSek måste vara nummer / float)
        convertCurrency(10, "usd")          ->  Exception: currency "usd" not valid. ($to måste matcha valutans ISO 4217 angivna kod i stora bokstäver)
*/