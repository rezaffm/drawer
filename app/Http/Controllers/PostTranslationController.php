<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostTranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            //dump($request->route('locale'));
            //dd($request->route('post'));

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $existingLocales = array_diff(
            app('translatable.locales')->all(),
            $post->translations()->pluck('locale')->toArray());

        return view('posts.translations.create', compact('existingLocales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Request $request)
    {
         $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->setDefaultLocale($request->input('locale'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')->withSuccess('Post saved succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $locale)
    {
        $post->setDefaultLocale($locale);

        return view('posts.translations.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $locale)
    {
         $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->setDefaultLocale($locale);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')->withSuccess('Post updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
