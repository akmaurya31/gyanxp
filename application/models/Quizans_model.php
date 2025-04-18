<?php
class Quizans_model extends CI_Model {

    public function get_quiz_by_id($quiz_id) {

        $this->db->where('id', $quiz_id);
        $query = $this->db->get('quizzes'); // Replace with your actual table name 

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function get_question_by_number($quiz_id, $question_number) {
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('id', $question_number);
        $this->db->order_by('id', 'ASC'); // ya 'question_order' agar column hai
        // $this->db->limit(1, $question_number - 1); // offset = question_number - 1
        $query = $this->db->get('questions');
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_user_answer($user_id=1, $quiz_id=1, $question_id=1) {
        $this->db->where('user_id', $user_id);
        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('question_id', $question_id);
        
        $query = $this->db->get('answers'); // 👈 change table name if needed
    
        if ($query->num_rows() > 0) {
            return $query->row(); // single row
        } else {
            return null;
        }
    }


    public function qanswer($user_id = 1, $quiz_id = 1) {
        // Get the list of answers for the specific user and quiz

        $user_id = $this->session->userdata('user_id');
        $quiz_id = $this->session->userdata('quiz_id');

        $this->db->select('id, question_id');  // Assuming 'id' is the answer ID and 'question_id' is the ID of the question
        $this->db->where('user_id', $user_id);
        $this->db->where('quiz_id', $quiz_id);
        $query = $this->db->get('answers');  // Replace 'answers' with your actual table name
    
        // Get the result as an array
        $answers = $query->result_array();
    
        // Count the total answers
        $answerCount = count($answers);
    
        // Return both count and the list of IDs
        return ['count' => $answerCount, 'ids' => array_column($answers, 'question_id')];
    }




    public function getQuesIds($quiz_id) {
        $this->db->select('id');
        $this->db->from('questions');
        $this->db->where('quiz_id', $quiz_id);
        $query = $this->db->get();
        
        $result = $query->result_array();
        $ids = array_column($result, 'id'); // Extract only the 'id' values
        return $ids; // 🔁 returns: [1, 2, 3, 4]
    }

    public function count_questions($quiz_id) {
        $this->db->where('quiz_id', $quiz_id);
        $this->db->from('questions');
        return $this->db->count_all_results();
    }


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

    // public function getQuizById($id) {
    //     return $this->db->get_where('quizzes', ['id' => $id])->row();
    // }


    // public function insert_quiz($data) {
    //     $this->db->insert('quiz', $data);
    //     return $this->db->insert_id();
    // }
    
    public function updateQuiz($id, $data) {
        return $this->db->where('id', $id)->update('quizzes', $data);
    }


    public function get_user_quiz_result($user_id, $quiz_id) {
        $this->db->select("
            qz.quiz_id,
            $user_id AS user_id,
            COUNT(DISTINCT qz.id) AS total_questions,
            COUNT(ans.id) AS attempted,
            SUM(CASE WHEN ans.selected_answer = qz.correct_option THEN 1 ELSE 0 END) AS correct_answers,
            ROUND(
                SUM(CASE WHEN ans.selected_answer = qz.correct_option THEN 1 ELSE 0 END) / COUNT(DISTINCT qz.id) * 100,
                2
            ) AS percentage
        ");
        $this->db->from('questions qz');
        $this->db->join('answers ans', "ans.question_id = qz.id AND ans.quiz_id = qz.quiz_id AND ans.user_id = $user_id", 'left');
        $this->db->where('qz.quiz_id', $quiz_id);
        $this->db->group_by('qz.quiz_id'); // 💡 FIX HERE
        $query = $this->db->get();
        return $query->row_array();
    }
    
    

}
