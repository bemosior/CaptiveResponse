<?php 
echo $this->fetch('content');

echo $this->Session->read('Auth.User.username');
echo "<br/>is the same as<br/>";
echo phpCAS::getUser();

?>

<ul>

<?php
	$attributes = phpCAS::getAttributes();
	foreach ($attributes as &$value) {
		echo '<li>' . $value . '</li>';
	} 

?>

</ul>