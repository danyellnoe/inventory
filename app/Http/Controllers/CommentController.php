<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Comment::create($data);
        $request->session()->flash('flashMessageType', 'success');
        $request->session()->flash('flashMessage', 'Your comment has been added!');

        return redirect('products');
    }
}
