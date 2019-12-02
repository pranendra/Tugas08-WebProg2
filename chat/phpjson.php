<?php
$con = new PDO("mysql:dbname=chat_json;host=localhost", "root", "");

$json = '{"message": {';
$query = $con->query("select * from message");
$json .= '"pesan": [ ';
foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $x) {
    $json .= '{';
    $json .= '"id": "' . $x['message_id'] . '",
    "user": "' . htmlspecialchars($x['username']) . '",
    "text": "' . htmlspecialchars($x['message']) . '",
    "time": "' . $x['post_time'] . '"
    },';
}
// menghilangkan koma di akhir
$json = substr($json, 0, strlen($json) - 1);
// var_dump($json);

// lengkapi penutup format json
$json .= ']';
$json .= '}}';

echo $json;
