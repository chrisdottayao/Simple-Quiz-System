<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'teacher') {
            $subjects = auth()->user()->subjectsTeaching()->latest()->get();
        } else {
            $subjects = auth()->user()->subjectsJoined()->latest()->get();
        }
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|max:255','description'=>'nullable|string']);
        $subject = Subject::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'teacher_id'=>auth()->id(),
            'code'=>Str::upper(Str::random(6)),
        ]);
        return redirect()->route('subjects.index')->with('success','Subject created. Code: '.$subject->code);
    }

    public function joinForm()
    {
        return view('subjects.join');
    }

    public function join(Request $request)
    {
        $request->validate(['code'=>'required|string']);
        $subject = Subject::where('code', $request->code)->first();
        if (!$subject) return back()->with('error','Invalid subject code.');
        $subject->students()->syncWithoutDetaching([auth()->id()]);
        return redirect()->route('subjects.index')->with('success','Joined subject: '.$subject->name);
    }

    public function missed(Subject $subject)
    {
        if (auth()->id() !== $subject->teacher_id) abort(403);
        $quizzes = $subject->quizzes()->with('questions')->get();
        $missed = [];

        foreach ($quizzes as $quiz) {
            foreach ($subject->students as $student) {
                $has = \App\Models\Result::where('quiz_id', $quiz->id)->where('user_id', $student->id)->exists();
                if ($quiz->deadline && now()->greaterThan($quiz->deadline) && ! $has) {
                    $missed[] = ['quiz'=>$quiz,'student'=>$student];
                }
            }
        }

        return view('subjects.missed', compact('missed','subject'));
    }
}
