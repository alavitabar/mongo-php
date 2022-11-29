<?php
    // connect to mongodb
    $m = new MongoClient();

    //echo "Connection to database successfully \n";
    // select a database
    $db = $m->satiadb;
    //echo "Database satiadb selected \n";

    $collection = $db->dns_logs;
    //echo "Collection selected succsessfully";
 

    $cursor = $collection->find([
        "serverip" => "8efb24ca", 
        "userip"=> "b97c70cc"
    ]);

    // iterate cursor to display title of documents
    foreach ($cursor as $document) {
        echo $document["domain"] . "\n";
    }

    echo "-------------------------- \n";

    $cursor = $collection->find([
        "serverip" => "36c06309", 
        "userip"=> "b9910bd8"
    ]);

    // iterate cursor to display title of documents
    foreach ($cursor as $document) {
        echo $document["domain"] . "\n";
    }

    echo "-------------------------- \n";

    $item = $collection->findOne([
        "serverip" => "8efb24ca", 
        "userip"=> "b97c70cc",
    ]);
    if($item){
        echo $item["domain"] . "\n";
    } else {
        echo "NOT EXIST \n";
    }


    date_default_timezone_set('UTC');
    $realtime = date("Y-m-d H:i:s");
    echo $realtime." \n";
    $mongotime = New Mongodate(strtotime($realtime));
    echo $mongotime ." \n";

    $epoch = 1669701813;
    $dt = new DateTime("@$epoch"); 
    //$dt->setTimezone(new DateTimeZone('UTC'));
    echo $dt->format('Y-m-d H:i:s'); 



?>
