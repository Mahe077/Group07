<?php
class Test_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printsomething()
    {
        echo "Hello from test model";
    }

    function getData()
    {
        return $this->db->select("SELECT * FROM person");
    }

    function insertData()
    {
        // return $this->db->alter("INSERT INTO `rating`(`user_id`, `rating`, `description`) VALUES (:id,:rate,:des)",['id'=>3,'rate'=>2.3,'des'=>'Poor delivery service offred by the delivery service but the product quality is high ,i am hiahlly recommend the this seller,please change the delivery service.']);
        return $this->db->alter("UPDATE `rating` SET  `user_id`=:uid ,`rating` = :rate, `description`=:des WHERE id = :id ", ['id' => 6, 'uid' => 5, 'rate' => 3.6, 'des' => 'Nice,awesome']);
    }

    function deteleData()
    {
        return $this->db->delete("DELETE FROM `rating` WHERE id=:id", ['id' => 6]);
    }
}
