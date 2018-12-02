<?php

function GenerateNumbers()
{
    $array = array();
    for($i = 1; $i < 11; ++$i)
    {
        $array[] = $i;        
    }    
    
    shuffle($array);
    return $array;
}

function MakeList($collection)
{    
    $output = "<ol>";    
    for ($i = 0; $i < count($collection); ++$i) 
    {
        $output .= "<li>$collection[$i]</li>";
    }
    $output .= "</ol>";    
    return $output;
}