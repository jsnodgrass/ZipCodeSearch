<?php

function SearchZip($searchzip)
{
    # Open the File.
     if (($handle = fopen("zipcode-database.csv", "r")) !== FALSE) {
         # Set the parent multidimensional array key to 0.
         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            //echo $nn . "<br>";
            if ($searchzip == $data[0])
            {
                //echo "found zip " . "<br>";
                //echo "<pre>";
                //   print_r($data);
                //echo "<pre>";
                break;
            }
         }
         fclose($handle);
     }
     return $data;
}

function Results($Location)
{
    if ($Location == "")
    {
        $output = '<span class=test>No Match Found, Please Try Again!</span>';
    }
    else
    {   
        $output = '<h4>' . $Location[3] . ", " . $Location[4] . "</h4><br>";
        $output .= '<h5>Latitude:  ' . $Location[1] . "</h5><br>";
        $output .= '<h5>Longitude: ' . $Location[2] . "</h5><br>";
        //echo $Location[0] . "<br>";
    }

return $output;
}
?>

