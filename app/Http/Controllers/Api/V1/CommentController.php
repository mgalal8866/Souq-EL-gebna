<?php

namespace App\Http\Controllers\Api\V1;


use App\Models\User;
use App\Models\items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
