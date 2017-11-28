<?php
function my_time($uploaded){
   $collapsed=time()-strtotime($uploaded);
    //$collapsed=time()->diff($uploaded);
    if($collapsed<1){
        return 'less than 1 second ago';
    }
    $agos=array(12*30*24*60*60=>'year',30*24*60*60=>'month',24*60*60=>'day',60*60=>'hour',60=>'minute',1=>'second');
    foreach($agos as $secs=>$desc){
        $d=$collapsed/$secs;
        if($d>=1){
            $near=round($d);
            return 'about'.$near.' '.$desc.($near>1?'s':'').' ago';
        }
    }
}

echo my_time($_GET['stamp']);
?>