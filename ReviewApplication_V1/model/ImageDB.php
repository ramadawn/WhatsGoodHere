<?php

class ImageDB{
   
    public function getImage($review_id){
        
        $db = Database::getDB();
        
        $query = "SELECT * FROM images
                   INNER JOIN Reviews
                   ON images.reviewID = Reviews.reviewID";
        
        $result = $db->query($query);
        $row = $result->fetch();
        $review_array = array();
        
        $review_array[] = $row;
        
        return $review_array;
        
        
    }
    
   public function addImage($name,$image,$review_id) {
        $db = Database::getDB();
        // reviewID must exist in review table first so make sure you process that first.
       // Make sure to provide all the the things below  
       // please capture the $name and $image using the method used in a  video i posted on discord
        // Especially reviewID because reviewID is a Foreign key
        
        $imgName = $name;
        $imgFile = $image;
        $reviewID = $review_id;

        $query =
            "INSERT INTO images
                 (imgName, imgFile, reviewID)
             VALUES
                 ('$imgName', '$imgFile', '$reviewID')";

        $row_count = $db->exec($query);
        return $row_count;
    }   
    
}

?>