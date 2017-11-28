<?php
function get_timeago( $ptime )
{
$estimate_time = (time()-7*60*60) - strtotime($ptime);
    /*date_default_timezone_get();
    echo "The time is " . date("H:i:sa",strtotime($ptime));
//echo date('y-m-d h:i:s',time());
die;*/
if( $estimate_time < 1 )
{
return 'less than 1 second
ago' ;
}
$condition = array (
12 * 30 * 24 * 60
* 60 => 'year' ,
30 * 24 * 60 * 60
=> 'month' ,
24 * 60 * 60
=> 'day' ,
60 * 60
=> 'hour' ,
60
=> 'minute' ,
1
=> 'second'
);
foreach ( $condition as $secs
=> $str )
{
$d = $estimate_time /
$secs ;
if( $d >= 1 )
{
$r = round ( $d );
return 'about ' . $r .
' ' . $str . ( $r > 1 ? 's' :
'' ) . ' ago' ;
}
}
}
$time=$_GET['stamp'];
echo get_timeago($time);
//echo ;
echo "<br>";
?>