<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\User;
use App\Models\items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\comments;
use App\Repositoryinterface\CategoryRepositoryinterface;

class CommentController extends Controller
{

    function CreateCommentItem(Request $request)
    {
        $item = items::find($request->item_id);
        $item->comments()->create([
            'user_id' => auth('api')->user()->id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);
        return Resp('', 'تم اضافه تقيمك بنجاح', 200);
    }

    function CreateCommentStore(Request $request)
    {
        $user = User::find($request->store_id);
        $user->comments()->create([
            'user_id' => auth('api')->user()->id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);
        return Resp('', 'تم اضافه تقيمك بنجاح', 200);
    }
    function get_item_by_id($id)
    {
        $item = items::find($id);
        return Resp(CommentResource::collection($item->comments), 'success', 200);
    }
    function get_store_by_id($id)
    {
        $user = User::find($id);
        return Resp(CommentResource::collection($user->comments), 'success', 200);
    }
    function delete_comment_by_id($id)
    {
        $comments = comments::find($id);
         $comments->delete();
        return Resp('', 'success', 200);
    }

}
