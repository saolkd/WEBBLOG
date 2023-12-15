<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::paginate(5);
        return view('posts.about', compact('abouts'));
    }

    public function about(): View
    {
        $abouts = About::all();
        return view('about', compact('abouts'));
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     //validate form
    //     $this->validate($request, [
    //         'image' => 'image|mimes:jpeg,jpg,png|max:2048',
    //         'title' => 'required|min:5',
    //         'sub_title' => 'required|min:5',
    //         'content' => 'required|min:7'
    //     ]);

    //     //upload image
    //     $image = $request->file('image');
    //     $image->storeAs('public/posts', $image->hashName());

    //     //create post
    //     About::create([
    //         'image' => $image->hashName(),
    //         'title' => $request->title,
    //         'sub_title' => $request->sub_title,
    //         'content' => $request->content
    //     ]);
    //     //redirect to index
    //     return redirect()->route('about.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    // }

    public function edit(string $id){
        $abouts = About::findOrFail($id);
        return view('posts.edit_about', compact('abouts'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'sub_title' => 'required|min:5',
            'content' => 'required|min:7'
        ]);
        //get post by ID
        $abouts = About::findOrFail($id);
        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
            //delete old image
            Storage::delete('public/posts/' . $abouts->image);
            //update post with new image
            $abouts->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'content' => $request->content
            ]);
        } else {
            //update post without image
            $abouts->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'content' => $request->content
            ]);
        }
        //redirect to index
        return redirect()->route('about.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function show(string $id): View
    {
        //get post by ID
        $abouts = About::findOrFail($id);

        //render view with post
        return view('posts.show_about', compact('abouts'));
    }
}
