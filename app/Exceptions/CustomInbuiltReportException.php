<?php
namespace TestProject\Exceptions;

use Exception;

class CustomInbuiltReportException extends Exception //\Exception denotes base class
{
    public function report()//base class function , here it is overrided
    {
        dd('custominbuilt report exception');
    }
}
