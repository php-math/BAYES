<p>
STEP 4 of 5: Enter likelihood of the tests given the hypothesis.
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
  <input type='hidden' name='next_step' value='5'>
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
  ?>
  <tr>
    <td>&nbsp;</td>
    <?php
    for ($e=0; $e < $num_tests; $e++) {         
      echo "<td align='center'><b>".$test_labels[$e]."</b></td>";
    }  
    ?>
 </tr>
 <?php   
 for($h=0; $h < $num_hypothesis; $h++) {
   echo "<tr>";
   echo "<td><b>".$hypothesis_labels[$h]."</b></td>";
   for ($e=0; $e < $num_tests; $e++) {     
     ?>
     <td align='center'>
       <?php
       $value = $likelihoods[$h][$e];
       echo "<input type='text' name='likelihoods[$h][$e]' value='$value' size='4' maxlength='5'>";
       ?>
     </td>
     <?php
   }
   echo "</tr>";
  }
  $num_cols = $num_tests + 1;
  ?>  
  <tr>
    <td colspan='<?php echo $num_cols ?>'>
      <br>
      <input type='submit' value='Step 5 >>'>
    </td>
  </tr>
  </form>     
</table>
