<?php
if ($_SERVER['HTTP_HOST'] == "localhost")
{
    define("SITE_URL", "http://localhost/path");
}
else
{
define("SITE_URL", "http://tourbookings.co");
}

?>


