<?php
class Checkout_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getCartId($userid)
    {
        return $_SESSION['cartid'] = $this->db->select2("SELECT `id` FROM `cart` WHERE userId = :userid;", ['userid' => $userid]);
    }
    public function getItem($itemid)
    {
        return $this->db->select2("SELECT temp.*,product.name FROM product, ( SELECT item.*,image_path FROM `item`,itemimage WHERE item.id = :itemid AND itemimage.id = :itemid) temp WHERE temp.productId = product.id;", ['itemid' => $itemid]);
    }
    public function load($userid)
    {
        $this->getCartId($userid);
        $cart = $this->db->select2("SELECT `itemId`, `qty` FROM `cart_item` WHERE cartId = :cartid;", ['cartid' => $_SESSION['cartid'][0][0]]);
        $cart_item = [];
        foreach ($cart as $key => $value) {
            $cart_item = array_merge($cart_item, $this->getItem($value[0]));
        }
        return [$cart_item, $cart];
    }
    public function delete($userid, $itemId)
    {
        //  -1 indicates that the request for delete all the items in the cart of particular user
        if ($itemId != -1) {
            $cart = $this->db->update("DELETE FROM `cart_item` WHERE cartId = :cartid AND itemId = :itemId;", ['cartid' => $_SESSION['cartid'][0][0], 'itemId' => $itemId]);
            // return "hello 123";
        } else {
            $cart = $this->db->update("DELETE FROM `cart_item` WHERE cartId = :cartid", ['cartid' => $_SESSION['cartid'][0][0]]);
            // return "hello";
        }
        return;
    }
    public function add($userid, $itemId, $qty, $status)
    {
        //  -1 indicates that the request for delete all the items in the cart of particular user
        if ($status == 0) {
            $cart = $this->db->update("INSERT INTO `cart_item`(`cartId`, `itemId`, `qty`) VALUES (:cartid,:itemId,:qty)", ['cartid' => $_SESSION['cartid'][0][0], 'itemId' => $itemId, 'qty' => $qty]);
            // return "item crated";
        } elseif ($status == 1) {
            $cart = $this->db->update("UPDATE `cart_item` SET `qty`=:qty WHERE `cartId`=:cartid AND `itemId`= :itemId", ['cartid' => $_SESSION['cartid'][0][0], 'itemId' => $itemId, 'qty' => $qty]);
            // return "item qty crated";
        } elseif ($status == 2) {
            if (isset($_SESSION['cartid'][0][0])) {
                $cart = $this->db->update("INSERT INTO `cart_item`(`cartId`, `itemId`, `qty`) VALUES (:cartid,:itemId,:qty)", ['cartid' => $_SESSION['cartid'][0][0], 'itemId' => $itemId, 'qty' => $qty]);
            } else {
                $cart = $this->db->transaction(array(
                    array(
                        "INSERT INTO `cart`(`userId`) VALUES (:userId)",
                        ['userId' => $_SESSION['userid']]
                    ),
                    array(
                        "INSERT INTO `cart_item`(`cartId`, `itemId`, `qty`) VALUES ((SELECT `id` FROM `cart` WHERE `userId` = :userId),:itemId,:qty)",
                        ['userId' => $_SESSION['userid'], 'itemId' => $itemId, 'qty' => $qty]
                    )
                ));
                $this->getCartId($userid);
                // return "cart and item crated";
            }
        }
        return;
    }
}
