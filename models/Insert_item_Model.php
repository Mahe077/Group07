<?php
class Insert_item_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function user($data = null)
    {
        return $this->db->select2("SELECT * FROM person WHERE size = :size or partNo=:partNo", ['size' => $data, 'partNo' => $data]);
    }
    public function createItem($brand,$price,$size,$partNo,$partNo_Manufacturer,$amount)
    {
        $this->db->alter(
            "INSERT INTO `item`
            (`brand`, `price`, `size`, `partNo`, `partNo_Manufacturer`,`amount`) 
            VALUES 
            (:brand, :price, :size, :partNo, :partNo_Manufacturer, :amount)",
            ['brand' => $brand,  'price' => $price, 'size' => $size, 'partNo' => $partNo, 'partNo_Manufacturer' => $partNo_Manufacturer, 'amount' => $amount]
        );
        // $last_id = $this->db->select2("SELECT id FROM person WHERE size = :size ", ['size' => $size]);
        // $id = $last_id[0][0];
        // $this->db->alter(
        //     "INSERT INTO `customer`
        //     (`id`, `district`, `city`, `postal_code`)
        //     VALUES 
        //     (:id, :district, :city, :postal_code)",
        //     ['id' => $id, 'district' => $district, 'city' => $city, 'postal_code' => $postalcode]
        // );
        // $this->db->transaction_with_last_inseted_Id(array(array(
        //     "INSERT INTO `person`
        //     (`brand`, `type`, `price`, `size`, `part`, `partNo`, `partNo_Manufacturer`, `color`, `imgName`) 
        //     VALUES 
        //     (:brand,:type, :price, :size, :part, :partNo, :partNo_Manufacturer, :color, :imgName)",
        //     ['brand' => $brand, 'type' => $type, 'price' => $sname, 'size' => $size, 'part' => $part, 'partNo' => $partNo, 'partNo_Manufacturer' => $partNo_Manufacturer, 'color' => $color, 'imgName' => $image]
        // ), array(
        //     "INSERT INTO `customer`
        //     (`id`, `district`, `city`, `postal_code`)
        //     VALUES 
        //     (:id, :district, :city, :postal_code)",
        //     ['district' => $district, 'city' => $city, 'postal_code' => $postalcode]
        // )));
    }
}
