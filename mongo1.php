<?php
    // connect to mongodb
    $m = new MongoClient();

    //echo "Connection to database successfully \n";
    // select a database
    $db = $m->satiadb;
    //echo "Database satiadb selected \n";

    $collection = $db->dns_logs;
    //echo "Collection selected succsessfully";
 

    $query1 = [ "serverip" => "36c06309",  "userip"=> "b9910bd8"];
    $query2 = [ "time" => ['$lte' => 1669701233]];

    $cursor = $collection->find($query1);

    // iterate cursor to display title of documents
    foreach ($cursor as $document) {
        echo $document["domain"] . "\n";
    }

    echo "-------------------------- \n";

    $cursor = $collection->find($query2);

    // iterate cursor to display title of documents
    foreach ($cursor as $document) {
        echo $document["domain"] . "\n";
    }

    echo "-------------------------- \n";

    $item = $collection->findOne($query1);
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
