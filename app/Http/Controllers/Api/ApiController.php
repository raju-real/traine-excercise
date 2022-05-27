<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Language;
use App\Subscriber;
use App\Trainer;
use App\TrainerTutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class ApiController extends Controller
{
    // Subscribe
    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if(Subscriber::where('email',$request->email)->exists()) {
            return Response::json(['type' => 'danger','message' => 'Already Subscribed']);
        }
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        if($subscriber->save()) {
            return Response::json(['type' => 'success','message' => 'Successfully Subscribe']);
        } else {
            return Response::json(['type' => 'warning','message' => 'Something Wrong, Try Again Later']);
        }
        
    }

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

    // Get Week list
    public function weekList() {
        $week = [];
        $i = 1;
        for($i == 1; $i <= 50; $i++) {
            array_push($week, $i);
        }
        return $week;
    }

    // Get Day list
    public function dayList() {
        return [1, 2, 3, 4, 5, 6, 7];
    }
}
