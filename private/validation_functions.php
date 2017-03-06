<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    /*if preg_match( "/^[a-zA-Z0-9\@\.\_\-]+$/", $value);
    return false;
    else
    return strpos($value, '@') && $test !== false;*/
    // Is this allowed?
    if (!filter_var($value, FILTER_VALIDATE_EMAIL))
    return false;
    else
    return true;
  }

  function has_valid_phone_format($value) {
      if (preg_match( "/^[0-9\-\(\)]+$/", $value))
      return true;
      else
      return false;
  }

  function has_valid_username_format($value){
      if (preg_match( "/^[a-zA-Z0-9\_]+$/", $value))
      return true;
      else
      return false;
}



//My custom validations
    /*function has_unique_username($user){
        global $db;
        $sql = "SELECT * FROM users WHERE username='" . $user['username'] . "' LIMIT 1;";
        $users_result = db_query($db, $sql);
        $check_user = db_fetch_assoc($users_result);
        if ($user['username'] == $check_user['username'] && $user['id'] != $check_user['id']){
            return false;
        }
        else
            return true;

    }*/
    function has_valid_code_format($value){
        if (preg_match( "/^[a-zA-Z]+$/", $value))
        return true;
        else
        return false;
    }
    function has_valid_name_format($value){
        if (preg_match( "/^[a-zA-Z\ ]+$/", $value))
        return true;
        else
        return false;
    }
    function has_valid_id_format($value){
        if (preg_match( "/^[0-9]+$/", $value))
        return true;
        else
        return false;
    }


    /*function has_unique_territory($territory){
        global $db;
        $sql = "SELECT * FROM territories WHERE name='" . $territory . "' LIMIT 1;";
        $result = db_query($db, $sql);
        $check_territory = db_fetch_assoc($result);
        if ($territory == $check_territory['name']){
            return false;
        }
        else
            return true;

    }*/

?>
