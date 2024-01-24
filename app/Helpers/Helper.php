<?php


function array_rand_value($arr,$count)
{
    $values = array();

    if($count==1)
    {
        array_push($values,$arr[0]);
    }
    else
    {
        $keys = array_rand( $arr, $count ); 

        for($i=0; $i < count($keys); ++$i)
        {
            array_push($values,$arr[$keys[$i]]); 
        }
    }
    
    return  $values;
}