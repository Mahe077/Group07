<?php

class Database extends PDO
{

    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD)
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASSWORD);
    }

    public function select($query)
    {
        $stmt = $this->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function select2($query, $data)
    {
        $stmt = $this->prepare($query);

        $stmt->execute($data);

        return $stmt->fetchAll();
    }

    public function alter($query, $data)
    {
        $stmt = $this->prepare($query);

        $stmt->execute($data);

        return;
    }
    public function update($query, $data)
    {
        $stmt = $this->prepare($query);

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function update2($query)
    {
        $stmt = $this->prepare($query);

        $stmt->execute();

    }
    public function insert($query, $data)
    {
        $stmt = $this->prepare($query);

        if ($stmt->execute($data)) {
            $lastid = $this->lastInsertId();
            return $lastid;
        } else {
            return false;
        }
    }

    public function delete($query, $data = null)
    {
        $stmt = $this->prepare($query);

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function transaction($data)
    {
        try {
            $this->beginTransaction();
            foreach ($data as $key => $value) {
                $stmt = $this->prepare($data[$key][0]);
                $stmt->execute($data[$key][1]);
                $stmt->closeCursor();
            }
            $this->commit();
            return true;
        } catch (PDOException $e) {
            $this->rollBack();
            die($e->getMessage());
            return false;
        }
    }
    
    public function special_1($user_id, $item_id, $total,$Advanced, $city, $address, $district, $qty)
    {                   
        try {
            $this->beginTransaction();
            $stmt = $this->prepare("INSERT INTO `orders`(`item_id`, `user_id`, `total_payment`, `payment`, `qty`) VALUES (:item_id, :user_id, :total_payment, :payment, :qty)");
            $stmt->execute(['item_id' => $item_id, 'user_id' => $user_id, 'total_payment' => $total, 'payment' => $Advanced, 'qty' => $qty]);
            $stmt->closeCursor();

            $id= $this->lastInsertId();

            $stmt = $this->prepare("INSERT INTO `delivery`(`user_id`, `order_id`, `district`, `city`, `address`) VALUES (:user_id, :id, :district, :city ,:address)");
            $stmt->execute(['user_id' => $user_id, 'city' => $city, 'address' => $address, 'district' => $district, 'id' => $id]);
            $stmt->closeCursor();

            $this->commit();
            return true;
        } catch (\Throwable $e) {
            $this->rollBack();
            die($e->getMessage());
            return false;
        }
    }
}
