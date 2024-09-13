<?php 
  ini_set('display_errors', '1'); 
  ini_set('display_startup_errors', '1');
?>

<html>
    <head>

    </head>
    <body>
        <form method="POST" action="index.php">
            <input type="text" name="query"/>
            <input type="submit" name="search"/>
        </form>
    </body>
</html>

<?php


$i = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $i<10) {
    $q = $_POST['query'];









    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://maps-data.p.rapidapi.com/searchmaps.php?query=$q&limit=1000&country=in&offset=0&zoom=13",
        //&lang=en&lat=31.86&lng=77.15
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: maps-data.p.rapidapi.com",
            "x-rapidapi-key: 871dece7d0msh4403b53a814977cp1772c5jsna7dd0b545c2f"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    $jsonformat = json_decode($response, true);
    
    if($err){
        echo "cURL Error #:" . $err;
    }else{
        echo gettype($jsonformat)."<br>";
        echo count($jsonformat["data"]);
        echo "<br>";
        
        
    
        $c = count($jsonformat["data"]);
        
    
    for($i = 0 ; $i<$c ; $i++){
        echo '<br>';
        echo $i;
        echo '<br>';
        print_r($jsonformat['data'][$i]["name"]);
        echo '<br>';
        print_r($jsonformat["data"][$i]["types"]);
        echo '<br>';
        //print_r($jsonformat["data"][$i]["description"]);
        //echo '<br>';
        print_r($jsonformat['data'][$i]["phone_number"]);
        echo '<br>';
        print_r($jsonformat['data'][$i]["full_address"]);
        echo '<br>';
        print_r($jsonformat['data'][$i]["website"]);
        echo '<br>';
        
        $d = count($jsonformat["data"][$i]["description"]);
    
        if($d){
           for($j = 0 ; $j<$d ; $j++){
                echo 'About restaurant:    ';
                print_r($jsonformat["data"][$i]["description"][$j]);
                echo '<br>';
           }
        }else{
            echo '<br>';
        }
    
    }
    
    if($err){
    echo 'cURL Error #:'.$err;
    }else{
    
    for($k = 0 ; $k<$c ; $k++){
        print_r($jsonformat['data'][$k]["phone_number"]);
        echo '<br>';
    }
    
    }
    
    }






    $i++;




   
}else{

    echo 'contact shubham 9380847067';
}






?>
