<?php
class ReviewsDB{
    public function getReviews() {
        $db = Database::getDB();
        $query = 'SELECT * FROM Reviews
                  INNER JOIN user_account
                      ON Reviews.userID = user_account.userID
                  INNER JOIN Restaurants
                      ON Reviews.restID = Restaurants.restID';
        $result = $db->query($query);
        $reviews_array = array();
        foreach ($result as $row) {
            
            
            
            $review = new Reviews();
         
            $review->setID($row['reviewID']);
            $review>setComments($row['comments']);
            $review->setScore($row['score']);
            $review->setDate($row['dateAdded']);
            $review->setRestID($row['restID']);
            $review->setUserID($row['userID']);
            $reviews_array[] = $review;
        }
        return $reviews_array;
    }
    
     public function getReview($review_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM Reviews
                  WHERE reviewID = '$review_id'";
        $result = $db->query($query);
        $row = $result->fetch();

        

        $review = new Reviews();
        $review->setID($row['reviewID']);
        $review>setComments($row['comments']);
        $review->setScore($row['score']);
        $review->setDate($row['dateAdded']);
        $review->setRestID($row['restID']);
        $review->setUserID($row['userID']);

        return $review;
    }
    public function deleteReviewByID($review_id) {
        $db = Database::getDB();
        $query = "DELETE FROM Reviews
                  WHERE reviewID = '$review_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    public function deleteReviewByRestUser($rest_id, $user_id) {
        $db = Database::getDB();
        $query = "DELETE FROM Reviews
                  WHERE restID = '$rest_id' AND userID = '$user_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    public function getReviewLastID() {
        // USE THIS before inserting into image table
        $db = Database::getDB();
        
        $query = "SELECT reviewID FROM Reviews
                  ORDER BY reviewID DESC LIMIT 1";
        $result = $db->query($query);
        $row = $result->fetch();
        
        $review = new Reviews();
        $review->setID($row['reviewID']);

        return $review;

        
    }
    public function addReview($review) {
        $db = Database::getDB();
 // Please note Foreign keys and that date is Y-m-d sql format
        // Make sure to grab restID and UserID through session cookie or anyway you like they must exist
        $score = $review->getScore();
        $comments = $review->getComments();
        $dateAdded = $review->getDate();
        $restID = $review->getRestID();
        $userID = $review->getUserID();

        $query =
            "INSERT INTO Reviews
                 (score, comments, dateAdded, restID, userID)
             VALUES
                 ('$score', '$comments', '$dateAdded', '$restID', '$userID')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}

?>

