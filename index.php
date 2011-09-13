<?php 
include("header.php");
require_once("connection.php");
require_once("functions.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!isset($_GET['Zip']))
{
    $Zipcode = "";
}
else
{
    $Zipcode = $_GET['Zip'];
}
?>
<div class="main">
  <form name="ZipCode" action="index.php" onsubmit="return validateForm()" method="GET">
  
     <label for="Zip">Enter Zip Code:</label><input name="Zip" type="text" value="<?php echo $Zipcode?>"/>
     <input id="search" name="submit" type="Submit" value="SEARCH" onclick="validate();" />
     
  </form>  
</div>

<?php
if (isset($_GET['Zip']))
    {
        $searchquery= "SELECT ZipID, ZipCode, City, State, Latitude, Longitude FROM ZipCodes WHERE Zipcode=$Zipcode";
        $Location = dbQuery($searchquery);    
        $GetResult = results($Location);
        echo $GetResult;
        if (count($Location) !== 0)
        {

?>
        <script type="text/javascript">initialize(<?php echo maplat($Location);?>, <?php echo maplng($Location); ?>)</script>
<?php
        }
    }
    
include("footer.php")
?>
