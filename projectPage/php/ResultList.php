<?php

//get the q parameter from URL
$p=$_GET["p"];

//lookup all hints from array if length of q>0
if (strlen($p) > 0)
  {
  $response="<li class=\"clickable\"><a href=\"#\"><span class=\"badge pull-right\">42</span>Home</a></li>";
  
  for($i=0; $i<intval($p); $i++)
    {
    echo $response;
    }
  }
?>