
<html>
<head>
<title>IND to USD</title>
</head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
<div class="container">
    <h1>Real Time Currency Converter</h1>
<form method="post">
  <div class="form-group" method="POST">
    <label for="exampleInputEmail1">From</label>
    <input name="from" class="form-control"  aria-describedby="emailHelp" placeholder="From(Example : INR)">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">To</label>
    <input name="to" class="form-control"  placeholder="To (Example : USD)">
  </div>
  <div class="form-group" method="POST">
    <label for="exampleInputEmail1">Amount</label>
    <input name="amount"  class="form-control"  aria-describedby="emailHelp" placeholder="Amount">
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="convert">
</form>
</div>
</body>


</html>
<?php
if(isset($_POST["submit"]))
{
    $from=$_POST["from"];
    $to=$_POST["to"];
    $amount=$_POST["amount"];
    $string = $from."_".$to;
    $curl = curl_init();
curl_setopt_array($curl,array(CURLOPT_URL=>"https://free.currconv.com/api/v7/convert?q=$string&compact=ultra&apiKey=98096b4b8a48c003edf7",CURLOPT_RETURNTRANSFER => 1));
    $response = curl_exec($curl);
    $response = json_decode($response,true);
    $rate = $response[$string];
    $total = $rate * $amount; 
    echo "<div class='container's>$amount $from = $total $to</div>" ;
    
}
?>