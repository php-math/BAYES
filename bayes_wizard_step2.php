<p>
STEP 2 of 5: Enter hypothesis and test labels.
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
  <input type='hidden' name='next_step' value='3'>
  <input type='hidden' name='num_hypothesis' value='<?php echo $num_hypothesis; ?>'>  
  <input type='hidden' name='num_tests' value='<?php echo $num_tests; ?>'> 
  <?php 
  for ($h=0; $h < $num_hypothesis; $h++) {  
    echo "<input type='hidden' name='priors[]' value='$priors[$h]'>\n";  
  }
  for ($h=0; $h < $num_hypothesis; $h++) {  
    for ($e=0; $e < $num_tests; $e++) { 
      $value = $likelihoods[$h][$e];    
      echo "<input type='hidden' name='likelihoods[$h][$e]' value='$value'>\n";  
    }
  }         
  for ($h=0; $h < $num_hypothesis; $h++) {
    $nice_num = $h + 1;
    ?>
    <tr>
      <td align='right'>Hypothesis Label <?php echo $nice_num ?></td>
      <td><input type='text' name='hypothesis_labels[]' value='<?php echo $hypothesis_labels[$h] ?>' size='30'></td>  
    </tr>
    <?php
  }
  for ($e=0; $e < $num_tests; $e++) {
    $nice_num = $e + 1;
    ?>
    <tr>
      <td align='right'>Test Label <?php echo $nice_num ?></td>
      <td><input type='text' name='test_labels[]' value='<?php echo $test_labels[$e] ?>' size='30'></td>  
    </tr>
    <?php
  }
  ?>
  <tr>
    <td colspan='2'>
      <br>
      <input type='submit' value='Step 3 >>'>
    </td>
  </tr>
  </form>     
</table>
