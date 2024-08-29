<?php
   $headers = getallheaders();
   
   if((!$headers["appKey"]) || $headers["appKey"] != "d4m0cl3s") 
   {
     exit("Invalid key");
   }

?>