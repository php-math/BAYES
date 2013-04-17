<p>
STEP 5 of 5: Probability of each hypotheis given test results.
</p>

<?php
include "Bayes.php";

$hypothesis_labels = $_POST["hypothesis_labels"];
$test_labels       = $_POST["test_labels"];
$priors            = $_POST["priors"];
$likelihoods       = $_POST["likelihoods"];

$num_hypothesis    = count($_POST["hypothesis_labels"]);
$num_tests         = count($_POST["test_labels"]);

$bayes = new Bayes($priors, $likelihoods);
$bayes->getPosterior();
$bayes->setRowLabels($test_labels);    // i.e., evidence
$bayes->setColumnLabels($hypothesis_labels); // i.e., hypothesis
$bayes->toHTML();
?>

<br />
<form method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
  <input type='hidden' name='num_hypothesis' value='<?php echo $num_hypothesis; ?>'>  
  <input type='hidden' name='num_tests' value='<?php echo $num_tests; ?>'>    
  <?php 
  for ($h=0; $h < $num_hypothesis; $h++) {  
    echo "<input type='hidden' name='hypothesis_labels[]' value='$hypothesis_labels[$h]'>\n";  
  }
  for ($h=0; $h < $num_tests; $h++) {    
    echo "<input type='hidden' name='test_labels[]' value='$test_labels[$h]'>\n";   
  }
  for ($h=0; $h < $num_hypothesis; $h++) {  
    echo "<input type='hidden' name='priors[]' value='$priors[$h]'>\n";  
  }
  for ($h=0; $h < $num_hypothesis; $h++) {  
    for ($e=0; $e < $num_tests; $e++) { 
      $value = $likelihoods[$h][$e];    
      echo "<input type='hidden' name='likelihoods[$h][$e]' value='$value'>\n";  
    }
  }
  ?>
  <select name='next_step'>
    <option value='1'>Start Again</option>
    <option value='2'>Reenter Labels</option>    
    <option value='3'>Reenter Priors</option>
    <option value='4'>Reenter Liklihoods</option>
  </select>
  <input type='submit' value='Go'>  
</form>  
