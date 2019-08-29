<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['only' => ['store','update','destroys']]);
    }

    public function index()
    {
        $questions=Question::latest()->get();
        return QuestionResource::collection($questions);
    }

    public function store(Request $request)
    {
       $question= Question::create($request->all());
       return response()->json(['message'=>'created'],201);
    }
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }


    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response()->json(['message'=>'updated'],202);
    }
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(['message'=>'deleted'],201);
    }
}
