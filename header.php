<!DOCTYPE HTML>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Zip Code Search</title>
<link type="text/css" rel="stylesheet" href="main.css" />

<script>
function validateForm()
{
var x=document.forms["ZipCode"]["Zip"].value;
if (x==null || x=="" || (isNaN(x)))
  {
  alert("Please Enter a Valid Zip Code");
  return false;
  }
}

</script>

</head>

<body>

<div id="header">
<h1 class="center">Zip Code Search</h1>
</div>
