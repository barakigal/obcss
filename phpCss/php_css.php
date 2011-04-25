<?php
header("Content-type: text/css; charset: UTF-8");

include_once 'config.php';
include_once 'php_css_func.php';

get_user_bb($userDefineShortcutsFile,$shortcuts);
$OBCSS=trimFile($workingOBCSS);
replace_by_reference($OBCSS, $vars,$shortcuts);
file_put_contents($outputCssFile, implode("\n", $OBCSS));
echo file_get_contents($outputCssFile);
?>
