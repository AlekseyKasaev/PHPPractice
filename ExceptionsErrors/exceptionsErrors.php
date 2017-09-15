<?php
/**
 * Practicing with exception and errors
 *
 * Launch tryToTouch() to get an exception
 * Launch itIsAnErrorStartingThisFunction() to get an error.
 */


set_exception_handler('exceptionHandler');
set_error_handler('errorHandler');


function exceptionHandler(Exception $exception) : void {
    do {
        printf(
            "Throwed exception number: %d, message: %s, file/line: %s/%d\n",
            $exception->getCode(),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
            );
    } while($exception = $exception->getPrevious());
}


function errorHandler($errno, $errstr, $errfile, $errline) : bool {
    if (!(error_reporting() & $errno)) {
        return FALSE;
    }

    switch ($errno) {
        case E_USER_ERROR:
            echo "USER ERROR: [$errno] $errstr\n";
            echo "In string $errline of $errfile file\n";
            exit;
            break;

        case E_USER_WARNING:
            echo "MY WARNING: [$errno] $errstr\n";
            break;

        case E_USER_NOTICE:
            echo "NOTICE: [$errno] $errstr\n";
            break;

        default:
            echo "ANOTHER ERROR: [$errno] $errstr\n";
            break;
    }

    return TRUE;
}


function tryToTouch() : void {
    try {
        doNotTouchMe();
    } catch (MyException $exception) {
        throw new Exception('It`s a failure!!!',124, $exception);
    }
}


function doNotTouchMe() : void {
    throw new MyException('Go away!', 123);
}


function itIsAnErrorStartingThisFunction() : void{
    trigger_error("It`s the most horrible PHP error in history!", E_USER_ERROR);
}


class MyException extends Exception {}