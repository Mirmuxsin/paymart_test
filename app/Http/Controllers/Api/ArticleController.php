<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Jobs\CommentJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{

    /**
     * Store a newly comment
     *
     * @param Request $request
     * @param Comment $comment
     * @param $id
     * @return mixed
     */
    public function store(Request $request, Comment $comment, $id)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required|max:255",
            "comment" => "required"
        ]);

        if ($validator->fails()) {
            $data = [
                "status" => 400,
                "errors" => $validator->errors()
            ];
            return response()->json($data);
        }

        $data['article_id'] = $id;
        $data['title'] = $request->input('title');
        $data['comment'] = $request->input('comment');

        $job = new CommentJob($data);
        $this->dispatch($job);

        $data = [
            "status" => 201,
            "data" => $data
        ];
        return response()->json($data);
    }

    /**
     * Increment Article Views
     *
     * @param $id
     * @return JsonResponse
     */
    public function viewIncrement($id)
    {
        $article = Article::query()
            ->find($id);

        $article->increment('views');
        return response()->json([
            'status' => 200,
            'count' => $article->views
        ]);
    }
}
