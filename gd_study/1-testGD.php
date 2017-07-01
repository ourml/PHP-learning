<?php 
header("content-type:text/html;charset=utf-8");
// 1-testGD

phpinfo();
var_dump(extension_loaded('gd'));
var_dump(function_exists('gd_info()'));
var_dump(gd_info());
print_r(get_defined_functions());