<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('comments')->paginate(10);
        
        return NewsResource::collection($news);
    }

    public function store(NewsRequest $request, News $news)
    {
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/news', $imageName);
            $news->image = $imageName;
        }

        $news->user_id = $request->user()->id;  // Associate with the logged-in user (assuming admin/superadmin)
        $news->save();

        return new NewsResource($news);
    }

    public function update(NewsRequest $request, News $news)
    {   
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/news', $imageName);
            $news->image = $imageName;
        }

        $news->user_id = $request->user()->id;  // Associate with the logged-in user
        $news->save();

        return new NewsResource($news);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['message' => 'News deleted successfully'], 200);
    }
}
