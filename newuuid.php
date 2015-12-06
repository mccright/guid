<?php
/**
 * Created using Notepad++ ang Geany.
 * User: m015886 -- Matt McCright
 * Date: 11/29/2015
 * Requires class Guid.php from https://github.com/pgaultier/guid
 * Problem-solving from last weekend, Matt McCright
 * GUID references:
 * https://www.ietf.org/rfc/rfc4122.txt
 * and
 * https://en.wikipedia.org/wiki/Globally_unique_identifier
 */
print("<html>");
print("<head>");
print("<title>GUIDs/UUIDs</title>");

print("<style type=\"text/css\">");
print("p {
font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;
font-size:1.0em;
text-align:left;
vertical-align: middle;
}");
print("h1 {
font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;
font-size:1.8em;
margin-top:5px;	
color:#000;
}");
print(".toplink {
font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;
font-size:.8em;
}");
print(".mnormal
{
font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif;
}");
print("</style>");

print("</head>");
print("<body class=\"mnormal\" >");

print("<h1>UUID/GUID Generator</h1>");

require('Guid.php');

// Add some entropy to the namespace
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
$v3name = getrand();
$v5name = getrand();
// As a nod to the rfc, add a temporal component
list($usec, $sec) = explode(' ', microtime());
$v3name = ($v3name . $sec);
list($usec, $sec) = explode(' ', microtime());
$v5name = ($usec . $v5name);

$seedForv3 = (\guid\Guid::v4());
$guidv3 = \guid\Guid::v3($seedForv3, $v3name);
print("This is a v3 UUID: <strong>" . $guidv3 . "</strong>");
print("<br><br>");

$guidv4 = \guid\Guid::v4();
print("This is a v4 UUID: <strong>" . $guidv4 . "</strong>");
print("<br><br>");

$seedForv5 = (\guid\Guid::v4());
$guidv5 = \guid\Guid::v5($seedForv5, $v5name);
print("This is a v5 UUID: <strong>" . $guidv5 . "</strong>");
print("<br><br>");
print("<hr><br>");

print("I added entropy by feeding a v4 UUID into the generation all 3 UUID types<br>");
print("I also attempted to add entropy to the UUID generation for v3 & v5 UUIDs by building another large input using repeated calls to mt_rand().<br><br />");

print("The v3 additional \"random\" value is: " . $seedForv3 . "<br>");
print("The v3 \"name\" value is: " . $v3name . "<br>");

print("The v5 additional \"random\" value is: " . $seedForv5 . "<br>");
print("The v5 \"name\" value is: " . $v5name . "<br>");
print("<br>");

print("<hr>");
print("REFERENCES:<br />");
print("GUID/UUID Guidance <a href=\"https://www.ietf.org/rfc/rfc4122.txt\">https://www.ietf.org/rfc/rfc4122.txt</a><br />");
print("<a href=\"https://en.wikipedia.org/wiki/Universally_unique_identifier\">https://en.wikipedia.org/wiki/Universally_unique_identifier</a><br />");
print("and <a href=\"https://en.wikipedia.org/wiki/Globally_unique_identifier\">https://en.wikipedia.org/wiki/Globally_unique_identifier</a>.<br />");
print("Requires class Guid.php from <a href=\"https://github.com/pgaultier/guid\">https://github.com/pgaultier/guid</a>.<br />");
 
print("<br>");

$dateTime = new DateTime();
$dateTime->setTimeZone(new DateTimeZone('America/Chicago'));
setlocale(LC_ALL, 'EN');
echo $date = date("Y-m-d H:i:s");
echo " ";
print($dateTime->format('T'));
print("</body>");
print("</html>");
