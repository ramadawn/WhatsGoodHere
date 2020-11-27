<?php

class RestaurantsDB{
    
    public function getAllRestaurants() {
        $db = Database::getDB();
        $query = 'SELECT * FROM restaurants';
        $result = $db->query($query);
        $store_array = array();
        foreach ($result as $row) {
            
            
            $store = new restaurants();
            $store->setID($row['restID']);
            $store->setName($row['restName']);
            $store->setAddress($row['restAddress']);
            $store->setPhone($row['restPhone']);
            $store_array[] = $store;
        }
        return $store_array;
    }
 
    public function getRestaurants($rest_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM restaurants
                  WHERE restID = '$rest_id'";
        $result = $db->query($query);
        $row = $result->fetch();

        $store = new Restaurants();
        $store->setID($row['restID']);
        $store->setName($row['restName']);
        $store->setAddress($row['restAddress']);
        $store->setPhone($row['restPhone']);

        return $store;
    }
    
 public function deleteRestaurant($rest_id) {
        $db = Database::getDB();
        $query = "DELETE FROM restaurants
                  WHERE restID = '$rest_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    public function deleteRestaurantByName($rest_name) {
        $db = Database::getDB();
        $query = "DELETE FROM restaurants
                  WHERE restName = '$rest_name'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
 
    
  public function addRestaurants($restaurant) {
        $db = Database::getDB();

        
        $restName = $restaurant->getName();
        $restAddress = $restaurant->getAddress();
        $restPhone = $restaurant->getPhone();

        $query =
            "INSERT INTO restaurants
                 (restName, restAddress, restPhone)
             VALUES
                 ('$restName', '$restAddress', '$restPhone')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}





?>

