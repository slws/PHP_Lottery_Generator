<html>
<head>
    <title>Lottery Number Generator</title>
</head>
<body>
<?php
function lotto($amount) {
  $luckyDip = [];
  $lottoSet = array_fill(1,59,1);
    while (count($luckyDip) < $amount) {
      $rNum = mt_rand(1,59);
      if($lottoSet[$rNum] == 1) {
        $luckyDip[] = $rNum;
      $lottoSet[$rNum] = 0;
      }
    }
    asort($luckyDip);
    foreach ($luckyDip as $item) {
      if ($item != end($luckyDip) ) {
        echo $item . ", ";
      }
      elseif ($amount > 1) {
        echo "and " . $item . ".";
      }
      else {
    echo $item . ".";
      }
    }
} 
if ($_POST["amount"] > 0){
  $postAmount = $_POST["amount"];
  if ($postAmount < 60){
      echo "<p>Your luckydip lotto numbers, in numerical order, are:</p>";
      echo "<p>";
      lotto($postAmount);
      echo "</p>";
  }
  else {
    echo "<p>Please select an amount less than 60.</p>";
  }
?>

<button onclick="history.go(-1);">Back</button>
<?php
}
else {
?>
<form action="luckydip.php" method="post">
How many numbers would you like to generate?
<p><input type="int" name="amount"> (Choose 6 for stanard Lotto)</p>
<input type="submit">
</form>
<?php
}
?>
</body>
</html>
