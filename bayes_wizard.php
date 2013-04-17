<html>
<head>
  <title>Bayes Wizard</title>
</head>
<body>

<p>
<b>Bayes Wizard</b>
</p>

<?php 
if (in_array($_POST['next_step'], array('2','3','4','5')))
  $next_step = $_POST['next_step'];
else 
  unset($next_step); 

if (isset($next_step)) 
  include "bayes_wizard_step". $next_step .".php";
else 
  include "bayes_wizard_step1.php";
?>    

</body>
</html>