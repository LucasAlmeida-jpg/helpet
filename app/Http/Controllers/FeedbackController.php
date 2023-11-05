<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json(['data' => $feedbacks], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $feedback = new Feedback;
            $feedback->feedback_tutor = $data['feedback_tutor'];
            $feedback->name_tutor = $data['name_tutor'];
            $feedback->save();

            return response()->json([
                'data' => $feedback
            ], 201);
        } catch (\Throwable $th) {
            \Log::error('Erro ao criar Feedback: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

}
