<?php
//file_put_contents('index.shtml','hello world');
ob_start();
echo 1234;
//file_put_contents('index.shtml', ob_get_contents());
file_put_contents('index.shtml', ob_get_clean());
/* End of file file.php */
