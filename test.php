<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-04-09 17:34:21
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-09 17:58:11
 */
function datetime () {
	$min = strtotime("20151227");
    $max = strtotime("20181130");

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}
$date = getdate(mktime(0, 0, 0, date('m'), date('d') - 3, date('Y')));
?>