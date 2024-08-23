<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Blog; // Import the Blog model
use Illuminate\Support\Facades\Storage;
class BlogsController extends Controller
{
    public function index()
    {
        // Fetch all blog records from the database
        $blogs = Blog::all();

        // Pass the blogs data to the view
        return view('pages.blog', compact('blogs'));
    }

    public function blogscreate()
    {
        return view('pages.blogcreate');
    }

    public function blogssave(Request $request)
{
    // Validate the request data
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|in:art,education,it',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', // Max 6 MB
        'description' => 'required|string',
    ], [
        'title.required' => "Enter the title",
        'title.max' => "Title cannot exceed 255 characters",
        'category.required' => "Select a category",
        'photo.image' => "Upload a valid image file",
        'description.required' => "Enter the description",
    ]);

    // Check if a file was uploaded
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $path = $file->store('photos', 'public'); // Save file and get path
        $data['photo'] = $path; // Store path in $data
    } else {
        $data['photo'] = null; // No photo uploaded
    }


    $data['status'] = 'pending'; 


    Blog::create($data);


    return redirect()->route('blog')->with('success', 'Blog created successfully!');
}
public function blogedit($id)
{

    $blog = Blog::findOrFail($id);

    // Return the view with the blog data
    return view('pages.blogedit', compact('blog'));
}
public function blogupdate(Request $request, $id)
{
    // Validate the request data
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|in:art,education,it',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',
        'description' => 'required|string',
    ], [
        'title.required' => "Enter the title",
        'title.max' => "Title cannot exceed 255 characters",
        'category.required' => "Select a category",
        'photo.image' => "Upload a valid image file",
        'description.required' => "Enter the description",
    ]);


    $blog = Blog::findOrFail($id);


    if ($request->hasFile('photo')) {

        if ($blog->photo) {
            \Storage::disk('public')->delete($blog->photo);
        }
        
        // Store the new photo
        $file = $request->file('photo');
        $path = $file->store('photos', 'public');
        $data['photo'] = $path;
    } else {

        $data['photo'] = $blog->photo;
    }


    $blog->update($data);


    return redirect()->route('blog')->with('success', 'Blog updated successfully!');
}
public function  delete($id)
{
    $blog = Blog::findOrFail($id);
    

    if ($blog->photo) {
        \Storage::disk('public')->delete($blog->photo);
    }

    $blog->delete();

    return redirect()->route('blog')->with('success', 'Blog deleted successfully!');
}

public function updateStatus(Request $request)
{ 
    // dd($request->all());
    $request->validate([
        'id' => 'required|exists:blogs,id',
        'status' => 'required|in:approved,pending',
    ]); 
    $blog = Blog::find($request->id);
    $blog->status = $request->status;
    $blog->save();

    return redirect()->back()->with('status', 'Blog status updated successfully!');

    return redirect()->back()->with('success', 'Blog status updated successfully.');
}


    
}
