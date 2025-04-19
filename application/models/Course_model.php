<?php
class Course_model extends CI_Model {

    public function get_all() {
        return $this->db->order_by('position')->get('courses')->result();
    }

    public function get($id) {
        return $this->db->get_where('courses', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('courses', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('courses', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('courses');
    }

    public function getChaptersByCourse($course_id)
    {
        $this->db->select('id, course_id, chapter_title, description');
        $this->db->from('chapters');
        $this->db->where('course_id', $course_id);
        return $this->db->get()->result();
    }

    public function getTopicsByChapter($chapter_id)
    {
        $this->db->select('id, chapter_id, title, type, content, url, duration, `order`');
        $this->db->from('topics');
        $this->db->where('chapter_id', $chapter_id);
        $this->db->order_by('`order`', 'ASC');
        return $this->db->get()->result();
    }

    public function getChaptersWithTopics($course_id)
    {
        // Get all chapters for this course
        $this->db->where('course_id', $course_id);
        $chapters = $this->db->get('chapters')->result();

        foreach ($chapters as &$chapter) {
            // Har chapter ke liye uske topics laao
            $this->db->where('chapter_id', $chapter->id);
            $chapter->topics = $this->db->get('topics')->result();
        }

        return $chapters;
    }

    public function getTopic($id)
    {
        return $this->db->where('chapter_id', $id)
                        ->get('topics')
                        ->row();
    }

    public function mgetTopic($chapter_id)
    {
        return $this->db->where('chapter_id', $chapter_id)
                        ->get('topics')
                        ->result();  // <-- Multiple rows return karega
    }

}
