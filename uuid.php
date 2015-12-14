<?php
/**
 * Created using Geany.
 * Author: Matt McCright
 * Date: 12/13/2015
 * Uses uuidclass.php, a subset of Guid.php from 
 * 	Philippe Gaultier -- https://github.com/pgaultier/guid
 * Generate a Version 5 uuid -- no extra HTML
 * Suitable for use with scripts or applications requiring a 
 * 	reasonable-entropy uuid.  For examp, appending a uuid to a 
 *  filename to ensure uniqueness.
 * GUID references:
 * https://www.ietf.org/rfc/rfc4122.txt
 * https://en.wikipedia.org/wiki/Universally_unique_identifier
 * and
 * https://en.wikipedia.org/wiki/Globally_unique_identifier
 */
/* no  cache headers */
header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require('uuidclass.php');

/* Add some entropy to the namespace */
function getrand(){
    $gendguida = array(0,0,0,0,0,0,0,0,0,0,0);
    for ($i=0;$i<10;$i++) {
        $n = mt_rand(0, 199999);
        //print($n);
        $gendguida[$i] = $n;
    }
    //print_r($gendguida);
    $gendguids = implode($gendguida);
    return $gendguids;
    //}
}
$v5name = getrand();
// As a nod to the rfc, add a temporal component
list($usec, $sec) = explode(' ', microtime());
$v5name = ($usec . $v5name);

$seedForv5 = (\uuidclass\uuid::v4());
$guidv5 = \uuidclass\uuid::v5($seedForv5, $v5name);
print($guidv5);

