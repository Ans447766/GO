<?php
//INCLUDE THIS FILE ALWAYS ON TOP
// 2	    E_WARNING	             Non-fatal run-time errors. Execution of the script is not halted
// 8	    E_NOTICE	             Run-time notices. The script found something that might be an error, but could also happen when running a script normally
// 256    	E_USER_ERROR	         Fatal user-generated error. This is like an E_ERROR set by the programmer using the PHP function trigger_error()
// 512    	E_USER_WARNING	         Non-fatal user-generated warning. This is like an E_WARNING set by the programmer using the PHP function trigger_error()
// 1024    	E_USER_NOTICE	         User-generated notice. This is like an E_NOTICE set by the programmer using the PHP function trigger_error()
// 4096    	E_RECOVERABLE_ERROR	     Catchable fatal error. This is like an E_ERROR but can be caught by a user defined handle (see also set_error_handler())
// 8191    	E_ALL	                 All errors and warnings (E_STRICT became a part of E_ALL in PHP 5.4)
//_______________________________________________________________________________________________________________________________________________________________
// Assigning error handling functions.
register_shutdown_function("shutdownHandler");
set_error_handler("customError",E_ALL);
// error handler functions
function customError($errno, $errstr,$errfile,$errline) {
    $error = "<b>Error:</b> [$errno]<br> $errstr<br><b>$errfile</b> | <b>$errline</b>";
    echo "<div style='background-color:purple;color:white;position:fixed;top:0px;bottom:0px;left:0px;right:0px;width:100%;height:100%;font-family:monaco;padding:20px;'>".$error."</div>";
    // header(location:crash.php?err=$error); //redirect user to crash page
    die();
}
function shutdownHandler() {
    $lasterror = error_get_last();
    if($lasterror){
        $error = "<b>SHUTDOWN</b> <br><br>lvl:" . $lasterror['type'] . " <br> msg:" . $lasterror['message'] . " <br> <b>file:" . $lasterror['file'] . "</b> | <b>ln:" . $lasterror['line'] ."</b>";
        echo "<div style='background-color:#d20000;color:white;position:fixed;top:0px;bottom:0px;left:0px;right:0px;width:100%;height:100%;font-family:monaco;padding:20px;'>".$error."</div>";
        // header(location:crash.php?err=$error); //redirect user to crash page
        die();
    }else{ }
}
?>