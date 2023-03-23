<?php
session_start();
include "conn.php";
if (isset($_POST['submit'])){
$ch = curl_init();
$str="generate a detailed feedback about my answers to multiple choice questions".$_SESSION['q1'].",".$_SESSION['q2']."are ".$_POST['str'].",".$_POST['str1'];
$data=array( "model"=> "text-davinci-001",
  "prompt"=> $str,
  "temperature"=> 0.4,
  "max_tokens"=> 2000,
  "top_p"=> 1,
  "frequency_penalty"=> 0,
  "presence_penalty"=> 0);
$data=json_encode($data);
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer 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' ;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
$result=json_decode($result,true);
curl_close($ch);
echo $result['choices'][0]['text'];
}
?>
