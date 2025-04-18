<?php
class Quiz_model extends CI_Model {

    public function get_questions() {
        return $this->db->get('questions')->result();
    }

    public function insert_quiz($data) {
        $this->db->insert('quizzes', $data);
        return $this->db->insert_id(); // returns new quiz_id
    }

    public function getAllQuizzes()
    {
        return $this->db->get('quizzes')->result();
    }

    public function getQuestionQuizzes($quiz_id = 1)
    {
        $this->db->select('questions.*, quizzes.title as quiz_title');
        $this->db->from('questions');
        $this->db->join('quizzes', 'quizzes.id = questions.quiz_id', 'left');

        if (!empty($quiz_id)) {
            $this->db->where('questions.quiz_id', $quiz_id);
        }

        $this->db->order_by('questions.id', 'DESC');
        $query = $this->db->get();
        // print_r($query);
        // die("ASdfa");
        return $query->result();
    }

    public function getQuestionById($question_id)
    {
        $this->db->where('id', $question_id);
        $query = $this->db->get('questions'); // Replace with your actual table name 

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function updateQues($id, $data) {
        return $this->db->where('id', $id)->update('questions', $data);
    }

    public function getQuizById($id) {
        return $this->db->get_where('quizzes', ['id' => $id])->row();
    }


    // public function insert_quiz($data) {
    //     $this->db->insert('quiz', $data);
    //     return $this->db->insert_id();
    // }
    
    public function updateQuiz($id, $data) {
        return $this->db->where('id', $id)->update('quizzes', $data);
    }


    public function get_quiz_name() {
        $qid = $this->session->userdata('quiz_id');
        
        $this->db->select('title, subtitle');
        $this->db->from('quizzes');
        $this->db->where('id', $qid); // ✅ Corrected line
        $this->db->limit(1);
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->title; // ya $row->subtitle agar subtitle chahiye
        } else {
            return null;
        }
    }

}
