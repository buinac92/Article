<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $article = Article::where('title', 'LIKE', "%$keyword%")->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
                ->orWhere('body', 'LIKE', "%$keyword%")
                ->orWhere('picture', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $article = Article::latest()->paginate($perPage);
        }

        return view('backend.article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users=User::pluck("name","id")->all();
        return view('backend.article.create',compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'min:5|max:30|required',
			'user_id' => 'required|integer'
		]);
        $requestData = $request->all();
                if ($request->hasFile('picture')) {
            $requestData['picture'] = $request->file('picture')
                ->store('uploads', 'public');
        }

        Article::create($requestData);

        return redirect('article')->with('flash_message', 'Article added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $users=User::pluck("name","id")->all();
        return view('backend.article.show', compact('article','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $users=User::pluck("name","id")->all();
        return view('backend.article.edit', compact('article','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'min:5|max:30|required',
			'user_id' => 'required|integer'
		]);
        $requestData = $request->all();
                if ($request->hasFile('picture')) {
            $requestData['picture'] = $request->file('picture')
                ->store('uploads', 'public');
        }

        $article = Article::findOrFail($id);
        $article->update($requestData);

        return redirect('article')->with('flash_message', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return redirect('article')->with('flash_message', 'Article deleted!');
    }
}
