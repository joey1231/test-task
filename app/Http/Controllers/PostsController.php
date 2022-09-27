<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $post = Post::create($request->all());
        return $this->successResponse('Successfully Create Post', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->errorResponse('Post Not Found');
        }

        return $this->successResponse('Successfully fetch Post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->errorResponse('Post Not Found');
        }

        return $this->successResponse('Successfully fetch Post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->errorResponse('Post Not Found');
        }
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->website_id = $request->get('website_id');
        $post->update();
        return $this->successResponse('Successfully update Post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (is_null($post)) {
            return $this->errorResponse('Post Not Found');
        }
        $post->delete();
        return $this->successResponse('Successfully delete Post');
    }
}
