<?php

function successResponse($msg, $code = 200, $data = null)
{
    return response()->json(['success' => true, 'message' => $msg, 'data' => $data], $code);
}

function errorResponse($msg, $code = 500, $errMessage = null)
{
    return response()->json(['success' => false, 'message' => $msg, 'errMessage' => $errMessage], $code);
}
