<?php

function setVisitTimeCookie()
 {
    $expiryTime = time() + 60 * 60 * 24 * 30; 
    setcookie('visit_time', time(), $expiryTime, '/');
}
if (!isset($_COOKIE['visit_time'])) 
{
    echo "Welcome! This is your first visit.";
    setVisitTimeCookie();
} 
else 
{
    $firstVisitTime = $_COOKIE['visit_time'];
    $currentTime = time();
    $timeDifference = $currentTime - $firstVisitTime;

    $minutes = floor($timeDifference / 60);
    $seconds = $timeDifference % 60;

    echo "You visited this page $minutes minute(s) and $seconds second(s) ago.";
}
?>
