<?php

namespace App\Http\Controllers;

use App\Http\Request\Validate;
use Illuminate\Http\Request;
use App\Repositories\FeedbackRepository;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    protected $feedbackRepository;

    function __construct(FeedbackRepository $feedbackRepository){
        $this->feedbackRepository = $feedbackRepository;
    }

    function insert(Request $request){
        $validator = Validator::make($request->all(), Validate::rules());
        if ($this->feedbackRepository->insertFeedback($request)) {
            return response()->json(["state" => "true"], 200);
        }else{
            return response()->json(["state" => "false", "data" => $validator->errors()], 200);
        }
    }
}
