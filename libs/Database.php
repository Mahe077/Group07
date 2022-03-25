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

        if ($stmt->execute($data)) {
            return true;
        } else {
            return false;
        }
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

    public function special_1($user_id, $item_id, $total, $Advanced, $address, $qty, $Cost)
    {
        try {
            $this->beginTransaction();
            $stmt = $this->prepare("INSERT INTO `orders`(`user_id`, `total_payment`, `payment`) VALUES ( :user_id, :total_payment, :payment)");
            $stmt->execute(['user_id' => $user_id, 'total_payment' => $total, 'payment' => $Advanced]);
            $stmt->closeCursor();

            $id = $this->lastInsertId();

            $stmt = $this->prepare("INSERT INTO `order_item`(`OrderId`, `ItemId`, `Qty`, `Cost`) VALUES (:id,:item_id, :qty, :Cost)");
            $stmt->execute(['id' => $id, 'item_id' => $item_id, 'qty' => $qty, 'Cost' => $Cost]);
            $stmt->closeCursor();


            $stmt = $this->prepare("INSERT INTO `delivery`(`order_id`, `address`, `status`, `accept`) VALUES (:id,:address,:status,:accept)");
            $stmt->execute(['address' => $address, 'id' => $id, 'status' => 0, 'accept' => 0]);
            $stmt->closeCursor();

            $stmt = $this->prepare("DELETE FROM `cart_item` WHERE `cartId`=(SELECT id FROM cart WHERE cart.userId = :user_id) AND `itemId`= :item_id;");
            $stmt->execute(['user_id' => $user_id, 'item_id' => $item_id]);
            $stmt->closeCursor();

            $this->commit();
            return true;
        } catch (\Throwable $e) {
            $this->rollBack();
            die($e->getMessage());
            return false;
        }
    }
    public function special_2($user_id, $item_id, $total, $Advanced, $qty, $Cost)
    {
        try {
            $this->beginTransaction();
            $stmt = $this->prepare("INSERT INTO `orders`(`user_id`, `total_payment`, `payment`) VALUES ( :user_id, :total_payment, :payment)");
            $stmt->execute(['user_id' => $user_id, 'total_payment' => $total, 'payment' => $Advanced]);
            $stmt->closeCursor();

            $id = $this->lastInsertId();

            $stmt = $this->prepare("INSERT INTO `order_item`(`OrderId`, `ItemId`, `Qty`, `Cost`) VALUES (:id,:item_id, :qty, :Cost)");
            $stmt->execute(['id' => $id, 'item_id' => $item_id, 'qty' => $qty, 'Cost' => $Cost]);
            $stmt->closeCursor();

            $stmt = $this->prepare("DELETE FROM `cart_item` WHERE `cartId`=(SELECT id FROM cart WHERE cart.userId = :user_id) AND `itemId`= :item_id;");
            $stmt->execute(['user_id' => $user_id, 'item_id' => $item_id]);
            $stmt->closeCursor();

            $this->commit();
            return true;
        } catch (\Throwable $e) {
            $this->rollBack();
            die($e->getMessage());
            return false;
        }
    }
    public function special_3($user_id, $itemIds, $total, $Advanced, $address, $qtys, $Cost, $cout)
    {
        try {
            $this->beginTransaction();
            $stmt = $this->prepare("INSERT INTO `orders`(`user_id`, `total_payment`, `payment`) VALUES ( :user_id, :total_payment, :payment)");
            $stmt->execute(['user_id' => $user_id, 'total_payment' => $total, 'payment' => $Advanced]);
            $stmt->closeCursor();

            $id = $this->lastInsertId();
            for ($i = 0; $i < $cout; $i++) {
                $stmt = $this->prepare("INSERT INTO `order_item`(`OrderId`, `ItemId`, `Qty`, `Cost`) VALUES (:id,:item_id, :qty, :Cost)");
                $stmt->execute(['id' => $id, 'item_id' => $itemIds[$i], 'qty' => $qtys[$i], 'Cost' => $Cost[$i]]);
                $stmt->closeCursor();

                $stmt = $this->prepare("DELETE FROM `cart_item` WHERE `cartId`=(SELECT id FROM cart WHERE cart.userId = :user_id) AND `itemId`= :item_id;");
                $stmt->execute(['user_id' => $user_id, 'item_id' => $itemIds[$i]]);
                $stmt->closeCursor();
            }

            $stmt = $this->prepare("INSERT INTO `delivery`(`order_id`, `address`, `status`, `accept`) VALUES (:id,:address,:status,:accept)");
            $stmt->execute(['address' => $address, 'id' => $id, 'status' => 0, 'accept' => 0]);
            $stmt->closeCursor();

            $this->commit();
            return true;
        } catch (\Throwable $e) {
            $this->rollBack();
            die($e->getMessage());
            return false;
        }
    }
    public function special_4($user_id, $itemIds, $total, $Advanced, $qtys, $Cost, $cout)
    {
        try {
            $this->beginTransaction();
            $stmt = $this->prepare("INSERT INTO `orders`(`user_id`, `total_payment`, `payment`) VALUES ( :user_id, :total_payment, :payment)");
            $stmt->execute(['user_id' => $user_id, 'total_payment' => $total, 'payment' => $Advanced]);
            $stmt->closeCursor();

            $id = $this->lastInsertId();
            for ($i = 0; $i < $cout; $i++) {
                $stmt = $this->prepare("INSERT INTO `order_item`(`OrderId`, `ItemId`, `Qty`, `Cost`) VALUES (:id,:item_id, :qty, :Cost)");
                $stmt->execute(['id' => $id, 'item_id' => $itemIds[$i], 'qty' => $qtys[$i], 'Cost' => $Cost[$i]]);
                $stmt->closeCursor();

                $stmt = $this->prepare("DELETE FROM `cart_item` WHERE `cartId`=(SELECT id FROM cart WHERE cart.userId = :user_id) AND `itemId`= :item_id;");
                $stmt->execute(['user_id' => $user_id, 'item_id' => $itemIds[$i]]);
                $stmt->closeCursor();
            }
            $this->commit();
            return true;
        } catch (\Throwable $e) {
            $this->rollBack();
            die($e->getMessage());
            return false;
        }
    }
}
