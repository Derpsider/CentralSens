<?php

namespace App\Http\Controllers;
use App\Question;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store()
    {
        //backend required statement for safety
        request()->validate([
            'topic' => ['required', 'min:3'],
            'answer' => ['required', 'min:3']
        ]);


        //fetch from the database to save the objects
        //Question::create(request(['topic', 'answer']));
        Question::create($attributes);

        return redirect('/questions');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Question $question)
    {
        $question->update(request(['topic', 'answer']));

        return redirect('/questions');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        //Question::findorFail($id)->delete();

        return redirect('/questions');
    }

    public function show(Question $question)
    {
        //longer version of fetching the id
        //$question = Question::findorFail($id);

        return view('questions.show', compact('question'));
    }

    public function home()
    {
        return view('welcome', [
            'foo' => 'bar'
        ]);
    }
    public function contact() {
        return view('contact');
    }
    public function about() {
        return view('about');
    }
}
