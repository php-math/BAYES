<p>
STEP 1 of 5: Enter # hypothesis and # tests.
</p>

<table cellpadding='3' cellspacing='0' border='0'>
  <form method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
  <input type='hidden' name='next_step' value='2'>
  <tr>
    <td align='right'># Hypothesis</td>
    <td><input type='text' name='num_hypothesis' size='2' maxlength='3'></td>
  </tr>
  <tr>
    <td align='right'># Tests</td>
    <td><input type='text' name='num_tests' size='2' maxlength='3'></td>
  </tr>
  <tr>
    <td>
      <br>
      <input type='submit' value='Step 2 >>'>
    </td>
  </tr>
  </form>
</table>
  