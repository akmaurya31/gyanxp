<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('getTotalUsersAttempted')) {
    function getTotalUsersAttempted($quiz_id)
    {
        $CI = &get_instance(); // Get CodeIgniter instance
        $CI->load->database(); // Make sure DB is loaded

        $query = $CI->db->select('quiz_id')
                        ->select('COUNT(DISTINCT user_id) AS total_users_attempted')
                        ->from('answers')
                        ->where('quiz_id', $quiz_id)
                        ->group_by('quiz_id')
                        ->get();

        return $query->row(); // Return single row
    }
}

if (!function_exists('get_question_count_by_quiz_id')) {
    function get_question_count_by_quiz_id($quiz_id) {
        $CI =& get_instance(); // Get CodeIgniter instance
        $CI->load->database(); // Load database if not already loaded

        $CI->db->from('questions');
        $CI->db->where('quiz_id', $quiz_id);
        // $CI->db->where('deleted_at IS NULL', null, false); // Soft delete check

        return $CI->db->count_all_results(); // Return total number of questions
    }
}

if (!function_exists('get_course_name')) {
    function get_course_name($course_id) {
        $CI =& get_instance(); // get CI instance
        $CI->load->database(); // load database if not already loaded

        $query = $CI->db->get_where('courses', ['id' => $course_id])->row();
        return $query ? $query->course_name : 'N/A';
    }
}
