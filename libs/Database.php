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

    // first array items must contain a insert query
    // public function transaction_with_last_inseted_Id($data)
    // {
    //     try {
    //         $this->beginTransaction();
    //         $stmt = $this->prepare($data[0][0]);
    //         $id =  $stmt->execute($data[0][1]);
    //         $stmt->closeCursor();
    //         $stmt = $this->prepare($data[1][0]);
    //         $stmt->execute($data[1][1] + ['id' => $id]);
    //         $stmt->closeCursor();
    //         $this->commit();
    //         return true;
    //     } catch (PDOException $e) {
    //         $this->rollBack();
    //         die($e->getMessage());
    //         return false;
    //     }
    // }
}
