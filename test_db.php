<?php
  require_once("db-function.php");
  ;
  
  var_dump(findAll()) ;

  var_dump(findOneById(1)) ;

  insertProduct('GatoAuChocolat','c bon c bon',55);

  var_dump(findAll()) ;
  ?>