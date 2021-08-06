<?php
$ip =   "127.0.0.1";
exec("ping -n 3 $ip", $output, $status);
print_r($output);
?>