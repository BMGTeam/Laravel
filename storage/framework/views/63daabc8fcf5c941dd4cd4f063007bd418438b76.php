<?php
    use App\users;
	$user = users::where('name', $_GET['name'])->value('name');
	echo $user;
?>