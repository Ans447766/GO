<?php
//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr<br>";
  die();
}
// 2	     E_WARNING	             Non-fatal run-time errors. Execution of the script is not halted
// 8	     E_NOTICE	               Run-time notices. The script found something that might be an error, but could also happen when running a script normally
// 256    	E_USER_ERROR	         Fatal user-generated error. This is like an E_ERROR set by the programmer using the PHP function trigger_error()
// 512    	E_USER_WARNING	       Non-fatal user-generated warning. This is like an E_WARNING set by the programmer using the PHP function trigger_error()
// 1024    	E_USER_NOTICE	         User-generated notice. This is like an E_NOTICE set by the programmer using the PHP function trigger_error()
// 4096    	E_RECOVERABLE_ERROR	   Catchable fatal error. This is like an E_ERROR but can be caught by a user defined handle (see also set_error_handler())
// 8191    	E_ALL	                 All errors and warnings (E_STRICT became a part of E_ALL in PHP 5.4)
set_error_handler("customError",E_ALL);
?>