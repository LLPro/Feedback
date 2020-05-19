<?php


namespace App\Repositories;


use App\Feedback;
use Exception;
use Illuminate\Http\Request;


class FeedbackRepository
{
    function insertFeedback(Request $request){
        try {
            $feed = new Feedback();
            $feed->name = $request->get('name');
            $feed->phone = $request->get('phone');
            $feed->content = $request->get('text_area');
            $feed->save();
            return true;
        }catch (Exception $e){
            return false;
        }
    }
}
