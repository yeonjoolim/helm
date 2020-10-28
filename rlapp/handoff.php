<?php
$t = microtime(true);
$micro = sprintf("%06d",($t - floor($t)) * 1000000);
$d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

$connection = ssh2_connect('221.153.191.33',22);
ssh2_auth_password($connection, 'root', '!mecroot');


// Run a command that will probably write to stderr (unless you have a folder named /hom)

//$command = "cd sju/; kubectl exec ".$app." -n sju -c app -- .";
$stream = ssh2_exec($connection, $command);
$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);

// Enable blocking for both streams
stream_set_blocking($errorStream, true);
stream_set_blocking($stream, true);

$output = stream_get_contents($stream);

$app = substr($output, 0, 27);

$command = "cd sju/; kubectl apply -f video-ingress2.yaml";
$stream = ssh2_exec($connection, $command);

// Close the streams
fclose($errorStream);
fclose($stream);

$url = "Location:index.php?a=".$t;
Header($url);

ob_start();
?>
