<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Language;
use App\Trainer;
use App\TrainerTutorial;
use Illuminate\Http\Request;
use Response;

class ApiController extends Controller
{
    // Get all language
    public function allLanguage() {
        return Response::json(['data' => Language::orderBy('name')->get()]);
    }

    // Get all coach
    public function allCoach() {
        $data = Trainer::all();
        return Response::json(['data'=>$data]);
    }

    // Coach Details
    public function coachDetails($coach_id) {
        return Response::json(['data' => Trainer::findOrFail($coach_id)]);
    }

    // Get files by language and coach
    public function coachFiles($coach_id, $language_id) {
        $data = TrainerTutorial::with('language')->where('trainer_id', $coach_id)->where('language_id', $language_id)->get();
        return Response::json(['data' => $data]);
    }
}
