<?php

require_once 'common.php';

if(!$settings['beanstalk']) {
	die("Not configured to use beanstalk");
}
if(array_key_exists('SERVER_NAME', $_SERVER)) {
	die("Script can't be used from a web browser");
}

require_once('Pheanstalk/pheanstalk_init.php');

$pheanstalk = new Pheanstalk($settings['beanstalk']['host']);

while(true) {
	$job = $pheanstalk->watch($settings['beanstalk']['tube'])->ignore('default')->reserve();
	$bid = $job->getData();
	if($job == 'die') {
		$pheanstalk->delete($job);
		die();
	}
	echo "GETTING: ".$bid."\n";
	print_r(bungie::getUserUpdate($bid));
	$pheanstalk->delete($job);
}

?>
