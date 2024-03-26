<?php

namespace App\Utils;

use Exception;
use Illuminate\Database\QueryException;

class CheckErrors
{
    public static function check(Exception $error)
    {
        if ($error instanceof QueryException) {
            return RequestResponses::responseError(
                503,
                "The server is not ready to handle the request"
            );
        }

        return RequestResponses::responseError(
            500,
            "An error has occurred in the connection to the server"
        );
    }
}
