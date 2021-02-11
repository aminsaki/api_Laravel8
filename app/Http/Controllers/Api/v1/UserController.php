<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Respostroy\InterfaceUser;
use Illuminate\Http\Request;


class UserController extends Controller
{
    use ApiController;
    protected $user = null;

    public function __construct(InterfaceUser $users)
    {
        $this->user = $users;
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->setStatusCode(200) ->respond(['data' => $this->user->all()]);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->setStatusCode(200)->respond(['data' => new UserResource($this->user->show($id))]);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        return   $this->setStatusCode(200)->respondWithError([trans('massges.update')]);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user = $this->user->delete($id);
        if ($user) {
            return $this->setStatusCode(200)->respondWithError(trans('massges.delete'));
        }

        return $this->setStatusCode(200)->respondWithError(trans('massges.notPage'));
    }

}
