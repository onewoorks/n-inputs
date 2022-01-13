<?php
include_once('config.php');

$data = $_REQUEST;
$inputs = $data['data'];
$sql = '';

foreach($inputs as $key=>$input){
    $sql .= "INSERT INTO n_inputs (text_value) VALUES ('$input');";
}

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
    
include_once('data.php');