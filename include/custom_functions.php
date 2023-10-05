<?php

if (!function_exists("checkUniqueEmail")){
    function checkUniqueEmail($email)
{
  global $con;
  $sql = "SELECT * from tbl_member where email = '$email'";

  $query =mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  return isset($result['email']) ?  $result['email'] : false;
}
}
