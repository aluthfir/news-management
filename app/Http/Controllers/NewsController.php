<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('comments')->paginate(10);
        
        return NewsResource::collection($news);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        $news = new News;
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
}
