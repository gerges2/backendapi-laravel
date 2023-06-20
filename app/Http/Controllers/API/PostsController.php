<?php

namespace App\Http\Controllers\API;
use Mail;
use App\Mail\testmail;
use App\Http\Controllers\Controller;
use App\Models\posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function sendmail(Request $request){
$mailData=[
    'title' => 'mail from title',
    'body' => 'This is test body from mail'];
Mail::to('gergesvictor512@gmail.com')->send(new testmail($mailData));
return'Email send successfully.';
    }















    public function index(Request $request)
    {
        if ($request->user()->cannot('view',  posts::class)) 
        return "no access";
        return posts::where('is_published',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
$post=new posts();
$post->title=$request->title;
$post->body=$request->body;
$post->is_published=false;
$post->users_id = auth()->user()->id;
$post->save();    
return Response(['post' => $post],200);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    // public function show(string $id)
    {
        //
        // $this->authorize('viewAny', posts::class);
        if ($request->user()->cannot('viewAny', posts::class)) {
            return "no access";

        }
        return posts::where('is_published',0)->get();
        // return $this->authorize('viewAny', posts::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $post)
    {
        //

    // if( auth()->user()->id == $StSudent->user_id)
    // {
        // return "false";
    // }

    if ($request->user()->cannot('update', $post)) 
        return "no access";
    $post->is_published = true;
        $post->save();
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
