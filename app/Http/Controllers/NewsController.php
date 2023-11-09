<?php

namespace App\Http\Controllers;

use App\Constants\ResponseCode;
use App\Http\Requests\News\IndexNewsRequest;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Http\Resources\News\NewsCollection;
use App\Http\Resources\News\NewsResource;
use App\Models\News;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexNewsRequest $request): JsonResponse
    {
        $data = $request->all();
        $newsQuery = News::query();

        $perPage = (@$data['per_page']) ?
            $data['per_page'] : config('custom.page_setup.per_page');
        $sortBy = (@$data['sort_by']) ?
            $data['sort_by'] : config('custom.page_setup.sort_by');
        $orderBy = (@$data['order_by']) ?
            $data['order_by'] : config('custom.page_setup.order_by');

        $newsQuery = $newsQuery->orderBy($sortBy, $orderBy);
        $newsCollection = new NewsCollection($newsQuery->paginate($perPage));
        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.load'),
            false,
            $newsCollection
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return forbiddenResponse();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->all();
        $news = News::create($data);
        $newsResource = new NewsResource($news);

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.add'),
            false,
            $newsResource
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $newsResource = new NewsResource($news);

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.load'),
            false,
            $newsResource
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return forbiddenResponse();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->all();
        $news->update($data);
        $newsResource = new NewsResource($news);

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.update'),
            false,
            $newsResource
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.delete'),
            false,
            null
        );
    }
}
