<?php
date_default_timezone_set("Africa/Lagos");
function Greetings() {
  $time=date("H");
  if ($time<"12") {
    echo "Good Morning";
  }
  elseif ($time>="12" && $time<"17") {
    echo "Good Afternoon";
  }
  elseif ($time>="17" && $time < "19" ) {
    echo "Good Evening";
  }
  elseif ($time >= "19") {
    echo "Good Night";
  }
}

function countState($application,$state)
{
  $count=0;
  foreach ($application as $app) {
    $app->status==$state ? $count++ : $count;
  }
  echo $count;
}

 ?>
