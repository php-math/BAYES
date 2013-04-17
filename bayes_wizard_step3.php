<p>
STEP 3 of 5: Enter hypothesis priors.
</p>

<?php
$num_hypothesis    = $_POST["num_hypothesis"];
$num_tests         = $_POST["num_tests"];
$hypothesis_labels = $_POST["hypothesis_labels"];
$test_labels       = $_POST["test_labels"];
$priors            = $_POST["priors"];
$likelihoods       = $_POST["likelihoods"];
?>

<table cellpadding='3' cellspacing='0' border='0'>
  <form method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
  <input type='hidden' name='next_step' value='4'>
  <input type='hidden' name='num_hypothesis' value='<?php echo $num_hypothesis; ?>'>  
  <input type='hidden' name='num_tests' value='<?php echo $num_tests; ?>'>  
  <?php 
  for ($h=0; $h < $num_hypothesis; $h++) {  
    echo "<input type='hidden' name='hypothesis_labels[]' value='$hypothesis_labels[$h]'>";  
  }
  for ($h=0; $h < $num_tests; $h++) {    
    echo "<input type='hidden' name='test_labels[]' value='$test_labels[$h]'>";   
  }
  for ($h=0; $h < $num_hypothesis; $h++) {  
    for ($e=0; $e < $num_tests; $e++) { 
      $value = $likelihoods[$h][$e];    
      echo "<input type='hidden' name='likelihoods[$h][$e]' value='$value'>\n";  
    }
  }  
  for ($h=0; $h < $num_hypothesis; $h++) {
    ?>
    <tr>
      <td align='right'>Prior probability of <?php echo $hypothesis_labels[$h]; ?></td>
      <td><input type='text' name='priors[]' value='<?php echo $priors[$h]; ?>'; size='5' maxlength='6'></td>  
    </tr>
    <?php
  }
  ?>
  <tr>
    <td>
      <br>
      <input type='submit' value='Step 4 >>'>
    </td>
  </tr>
  </form>     
</table>
