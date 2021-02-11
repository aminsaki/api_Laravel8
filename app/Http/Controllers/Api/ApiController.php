<?php
/**
 * Created by PhpStorm.
 * User: amin
 * Date: 2/11/2021
 * Time: 2:24 AM
 */

namespace App\Http\Controllers\Api;


Trait ApiController
{

    protected $statusCode = 200;

    /**
     * @return null
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($message = "Not Found!")
    {
        return $this->setStatusCode(404)->respondWithError($message);

    }

    public function respondInternalError($message = "Internal Error!")
    {
        return $this->setStatusCode(500)->respondWithError($message);

    }

    public function respond($data, $headers = [])
    {

        return response()->json($data, $this->statusCode, $headers);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            "error" => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }
}