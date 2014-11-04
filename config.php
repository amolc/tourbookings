<?php
if ($_SERVER['HTTP_HOST'] == "localhost")
{
    define("SITE_URL", "http://localhost/path");
}
else if ($_SERVER['HTTP_HOST'] == "localhost:8080")
{
    define("SITE_URL", "http://localhost:8080/tourbookings/");
}
else
{
define("SITE_URL", "http://tourbookings.co");
}

?>


