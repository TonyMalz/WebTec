<?php
include_once("question_definitions.php");

$response = new stdClass();
if (array_key_exists('questions_asked', $_GET)){
    $questions_asked=  json_decode($_GET['questions_asked']);
    if (is_array($questions_asked)  && all_numeric($questions_asked)){

        $next_question = get_new_question($questions_asked);
        if ($next_question){
            $response->status = "okay";
            $response->question = $next_question;
        } else {
            $response->status = "error";
            $response->msg = "Error: No new question is available! Check if there is a sufficient amount of questions defined";
        }

    } else {
        $response->status = "error";
        $response->msg = "Wrong usage: Questions IDs are not in an array or contain non-numeric values!";
    }
} else {
    $response = new stdClass();
    $response->status = "error";
    $response->msg = "Wrong usage: IDs of questions have not been received (no parameter called 'questions_asked')!";
}
/*
 * Return the response in JSON format
 */
echo json_encode($response);

/**
 * Checks whether all values in the input array are numbers
 * @param $question_ids array objects
 * @return bool
 */
function all_numeric($question_ids){
    foreach ($question_ids as $id){
        if(!is_numeric($id)){
            return false;
        }
    }
    return true;
}

/**
 * Returns a random new question from the question database
 * @param $asked_question_ids The IDs of questions, which have already been asked
 * @return mixed
 */
function get_new_question ($asked_question_ids){
    global $all_questions;
    $available_ids = array();
    foreach ($all_questions as $question){
        if (!in_array($question->id, $asked_question_ids)){
            $available_ids[] = $question->id;
        }
    }
    if (sizeof($available_ids) <= 0){
        return null;
    }

    $random_index = rand(0, sizeof($available_ids) - 1);
    $next_question_index = $available_ids[$random_index] - 1;
    $chosen_question = $all_questions[$next_question_index];
    shuffle($chosen_question->possibleAnswers);
    return $chosen_question;
}

