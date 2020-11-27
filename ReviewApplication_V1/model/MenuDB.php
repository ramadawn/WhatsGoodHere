<?php

class MenuDB{
    public function getMenu() {
        $db = Database::getDB();
        $query = 'SELECT * FROM menu
                  INNER JOIN restaurants
                      ON menu.restID = restaurants.restID';
        $result = $db->query($query);
        $menus_array = array();
        foreach ($result as $row) {
            
            
            
            $menu = new Menu();
         
            $menu->setID($row['foodID']);
            $menu->setName($row['foodName']);
            $menu->setPrice($row['price']);
            $menu->setRestID($row['restID']);
            $menus_array[] = $menu;
        }
        return $menus_array;
    }
    
    public function deleteMenu($menu_id) {
        $db = Database::getDB();
        $query = "DELETE FROM menu
                  WHERE foodID = '$menu_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
     public function deleteMenuByfoodName($menu_name) {
        $db = Database::getDB();
        $query = "DELETE FROM menu
                  WHERE foodName = '$menu_name'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
   public function addMenu($menu) {
        $db = Database::getDB();

       // Make sure to provide all the the things below  
        // Especially restID because it is a Foreign key
        $foodName = $menu->getName();
        $price = $menu->getPrice();
        $restID = $menu->getRestID();

        $query =
            "INSERT INTO menu
                 (foodName, price, restID)
             VALUES
                 ('$foodName', '$price', '$restID')";

        $row_count = $db->exec($query);
        return $row_count;
    } 
}

?>

