<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
//use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('id', 'desc')->paginate(10);
        return view('index', compact('feedbacks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $feedback = new Feedback();

        $feedback->name = $request['name'];
        $feedback->email = $request['email'];
        $feedback->message = $request['message'];

        return response()->json([
            'success' => $feedback->save()
        ]);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect(action('FeedbackController@index'));
    }
}
