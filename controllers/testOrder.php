<?php

$data = serialize($_POST);

$undata = unserialize($data);

print_r($undata);

