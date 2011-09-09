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
    if (count($csvarray) == 0)
    {
        $output = '<div class="badresult">';
        $output .= 'No Match Found, Please Try Again!</div>';
    }
    else
    {
        //print_r($csvarray);
        $output = '<div class="results">';
       $output .= '<img id="map" src="http://maps.googleapis.com/maps/api/staticmap?center='.$csvarray[0][1].','.$csvarray[0][2].'&zoom=9&size=400x400&maptype=roadmap
       &markers=color:blue%7Clabel:%7C'.$csvarray[0][1].','.$csvarray[0][2].'&sensor=false">';
        $output .= '<ul><li><h3>Zip matches the following towns in '.$csvarray[0][4].'<h3></li><br>';
        foreach ($csvarray as $town)
        {
            $output .= '<li>';
            $output .= '<h4>'.$town[3].'</h4>';
            $output .= '</li><br>';
        }
          $output .= '<li><h5>Latitude:  ' . $csvarray[0][1] . '</h5></li>';
          $output .= '<li><h5>Longitude: ' . $csvarray[0][2] . '</h5></li>';
        $output .= '</ul></div>';
    }
        return $output;
    }



/*
function Results($Location)
{
    if ($Location == "")
    {
        $output = '<div class="badresult">';
        $output .= 'No Match Found, Please Try Again!</div>';
    }
    else
    {
        $output = '<div class="results">';
        //$output .= '<img id="map" src="http://maps.googleapis.com/maps/api/staticmap?center='.$Location[1].','.$Location[2].'&zoom=9&size=400x400&maptype=roadmap
       //&markers=color:blue%7Clabel:%7C'.$Location[1].','.$Location[2].'&sensor=false">';
        $output .= '<h4>' . $Location[3] . ', ' . $Location[4] . '</h4><br>';
        $output .= '<h5>Latitude:  ' . $Location[1] . '</h5><br>';
        $output .= '<h5>Longitude: ' . $Location[2] . '</h5><br></div>';

        //echo $Location[0] . "<br>";
    }

return $output;
}
*/
?>

