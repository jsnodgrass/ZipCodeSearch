<?php 
include("header.php");
include_once("functions.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!isset($_REQUEST['Action']))
{
    $Action = 0;
    $Zipcode = "";
}
else
{
    $Action = $_REQUEST['Action'];
    $Zipcode = $_POST['Zip'];
}
?>
<div class="main">
  <form name="ZipCode" action="index.php?Action=1" onsubmit="return validateForm()" method="post">
  
     <label for="Zip">Enter Zip Code:</label><input name="Zip" type="text" value="<?php echo $Zipcode?>"/>
     <input id="search" name="submit" type="Submit" value="SEARCH" onclick="validate();" />
     
  </form>  
</div>

<div class="results">
<?php
if ($Action == 1)
    {
        $Location = SearchZip($Zipcode);
        $ShowLocation = Results($Location);
        echo $ShowLocation;
    }   
?>    
</div>


<?php
include("footer.php")
?>

