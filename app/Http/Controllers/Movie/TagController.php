<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Repositories\Movie\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private TagRepository $repository;

    /**
     * @param TagRepository $repository
     */
    public function __construct(TagRepository $repository)
    {
        $this->middleware('auth:api');
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return ApiResponse::success($this->repository->all());
    }
}
