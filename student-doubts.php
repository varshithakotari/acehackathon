<?php
session_start();
include "connect.php";
include "student-navbar.php";

?>
<?php
if (isset($_POST['str'])){
$ch = curl_init();
$str=$_POST['str'];
$data=array( "model"=> "text-davinci-001",
  "prompt"=> $str+"GIVE ME A 10 LINE FEEDBACK",
  "temperature"=> 0.4,
  "max_tokens"=> 1109,
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

<div>
<form method="post">
<input type="text" name="str">
<input type="submit" name="submit" value="ASK A DOUBT">
</form>
</div>