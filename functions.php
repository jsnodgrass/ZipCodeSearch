<?php


function SearchZip($searchzip)
{
    # Open the File.
     if (($handle = fopen("zipcode-database.csv", "r")) !== FALSE) {
         # Set the parent multidimensional array key to 0.
         $nn = 0;
         $csvarray = array();
         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            //echo $nn . "<br>";
            if ($searchzip == $data[0])
            {
            # Count the total keys in the row.
             $c = count($data);
             # Populate the multidimensional array.
             for ($x=0;$x<$c;$x++)
             {
                echo '<pre>';
                 $csvarray[$nn][$x] = $data[$x];
                echo '<pre>';
             }
             $nn++;
            }
         }
         fclose($handle);
     }
     
     return $csvarray;
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
        //print_r($locarray);
        $output = '<div class="results">';
       
       //this is the static map
       //$output .= '<img id="map" src="http://maps.googleapis.com/maps/api/staticmap?center='.$locarray[0][1].','.$locarray[0][2].'&zoom=9&size=400x400&maptype=roadmap
       //&markers=color:blue%7Clabel:%7C'.$locarray[0][1].','.$locarray[0][2].'&sensor=false">';
       
       $output .='<span id="map"></span>';
       
        $output .= '<ul><li><h3>Zip matches the following towns in '.$locarray[0][4].'<h3></li><br>';
        foreach ($locarray as $town)
        {
            $output .= '<li>';
            $output .= '<h4>'.$town[3].'</h4>';
            $output .= '</li><br>';
        }
          $output .= '<li><h5>Latitude:  ' . $locarray[0][1] . '</h5></li>';
          $output .= '<li><h5>Longitude: ' . $locarray[0][2] . '</h5></li>';
          $output .= '</ul></div>';
    }
        return $output;
}
        
function maplat($location)
{
    $newlatlng=$location[0][1];
    return $newlatlng;
}

function maplng($location)
{
    $newlatlng=$location[0][2];
    return $newlatlng;
}
    
?>

