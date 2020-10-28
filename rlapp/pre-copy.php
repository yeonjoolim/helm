<?php
$connection = ssh2_connect('221.153.191.33',22);
ssh2_auth_password($connection, 'root', '!mecroot');

// Run a command that will probably write to stderr (unless you have a folder named /hom)

$command = "cd sju/; helm install videoapp-2 videoapp-2-0.1.0.tgz -n sju";
$stream = ssh2_exec($connection, $command);
$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

// Enable blocking for both streams
stream_set_blocking($errorStream, true);
stream_set_blocking($stream, true);

$output = stream_get_contents($stream);

$app = substr($output, 0, 27);

$url = "Location:index.php";
Header($url);

ob_start();
?>
