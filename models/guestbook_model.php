<?php 
 
class Guestbook_model extends CI_Model {
 
  public function __construct() {
    $this->load->database();
  }
 
  public function get_posts() {
	$q = 'SELECT * FROM posts ORDER by TIME DESC';
    $query = $this->db->query("$q");
    return $query->result_array();
  }
 
  public function set_posts() {
    $data = array(
      'text' => $this->input->post('text'),
      'author' => $this->input->post('author')
    );
    $data = $this->security->xss_clean($data);
 
   return $this->db->insert('posts', $data);
  }
 
}