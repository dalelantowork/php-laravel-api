<?php

namespace App\Http\Controllers;

use App\Constants\ResponseCode;
use App\Http\Requests\Comment\IndexCommentRequest;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Http\Resources\Comment\CommentCollection;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexCommentRequest $request)
    {
        $data = $request->all();
        $commentQuery = Comment::query();
        $commentQuery->when(@$data['news_id'], function ($query, $value) {
            $query->where('news_id', $value);
        });

        $perPage = (@$data['per_page']) ?
            $data['per_page'] : config('custom.page_setup.per_page');
        $sortBy = (@$data['sort_by']) ?
            $data['sort_by'] : config('custom.page_setup.sort_by');
        $orderBy = (@$data['order_by']) ?
            $data['order_by'] : config('custom.page_setup.order_by');

        $commentQuery = $commentQuery->orderBy($sortBy, $orderBy);
        $commentCollection = new CommentCollection($commentQuery->paginate($perPage));
        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.load'),
            false,
            $commentCollection
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
    public function store(StoreCommentRequest $request)
    {
        $data = $request->all();
        $comment = Comment::create($data);
        $commentResource = new CommentResource($comment);

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.add'),
            false,
            $commentResource
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $commentResource = new CommentResource($comment);

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.load'),
            false,
            $commentResource
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return forbiddenResponse();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $data = $request->all();
        $comment->update($data);
        $commentResource = new CommentResource($comment);

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.update'),
            false,
            $commentResource
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return globalResponse(
            ResponseCode::SUCCESS,
            config('custom.messages.crud.delete'),
            false,
            null
        );
    }
}
