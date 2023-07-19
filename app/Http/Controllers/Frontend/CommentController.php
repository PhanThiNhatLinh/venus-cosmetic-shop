<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    protected $commentModel;
    public function __construct(){
        
        $this->commentModel = new Comment();
    }
    public function createComment(Request $request)
    {
        // $commentModel = new Comment();
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;
        // dd($params);
        // die();
        $this->commentModel->insertItem($params,['task'=>'add_new_comment']);
        return redirect()->back();
    }
    
    public function deleteComment(Request $request)
    {
        // $commentModel = new Comment();
        $params = $request->all();
        $id = $params['id_comment'];
        //  dd($id);
        // die();
        $item = $this->commentModel->getItem($id,['task'=>'admin_get_item']);
        $this->commentModel->deleteItem($item,['task'=>'admin_delete_item']);
        return redirect()->back();
    }

}
