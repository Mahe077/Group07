<?php
class Index_Model extends Model{
    function __construct(){
        parent::__construct();
    }
    public function rating_loader(){
        return $this->db->select(
            "SELECT rating.*,person.fname,person.lname,person.image_path FROM `rating` LEFT JOIN person ON rating.user_id = person.id; "
        );
    }
}