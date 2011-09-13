<?php

function dbQuery($query) {
	$result = mysql_query($query);
	$output_array = array();
	while ($row = mysql_fetch_assoc($result))
        {
		$output_array[] = $row;
	}
	return $output_array;
}

function results($locarray)
{

    if (count($locarray) == 0)
    {
        $output = '<div class="badresult">';
        $output .= 'No Match Found, Please Try Again!</div>';
    }
    else
    {
        $output = '<div class="results">';
       
        $output .= '<ul><li><h3>Zip matches the following towns/citys in '.$locarray[0]['State'].'<h3></li><br>';
        $output .='<span id="map"></span>';
        foreach ($locarray as $town)
        {
            $output .= '<li>';
            $output .= '<h4>'.$town['City'].'</h4>';
            $output .= '</li><br>';
        }
          $output .= '<li><h5>Latitude:  ' . round($locarray[0]['Latitude'],6) . '</h5></li>';
          $output .= '<li><h5>Longitude: ' . round($locarray[0]['Longitude'],6) . '</h5></li>';
          $output .= '</ul></div>';
    }
        return $output;
}
        
function maplat($location)
{
    $newlatlng=$location[0]['Latitude'];
    return $newlatlng;
}

function maplng($location)
{
    $newlatlng=$location[0]['Longitude'];
    return $newlatlng;
}
    
?>

