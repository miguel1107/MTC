<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
 
 $num = Array();
 reset($num);
 for($i=1;$i<=95;$i++)
 {
   $num[$i]=rand(1,100);
    if($i>1)
    {
       for($x=1; $x<$i; $x++)
       {
         if($num[$i]==$num[$x])
         {
           $i--;
           break;
         }
      }
   }
 }
 foreach($num as $valor)
 {
   echo "$valor<BR>";
 }
?> 
</body>
</html>
