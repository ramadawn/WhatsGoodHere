<?php 






?>
<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	
    <h1>Leave Review Page</h1>
<div class="form">
	<form action="postReview" method="post">
	<label>Name:</label></br><input type="text" name="name"></br>
	<label>E-mail:</label></br> <input type="text" name="email"></br>
	<label>Restaurant:</label></br> <input type="text" name="restaurants"></br>
	<label>Dish:</label></br> <input type="text" name="dish"></br>
	<label>Review:</label> </br>
	<textarea name="review" rows="4" cols="50">
	Write your review here
	</textarea></br>
	<label>Post Image:</label></br><input type="file" id="myFile" name="filename">
	<input type="submit">
	</form>
</div>	

	<?php include('templates/footer.php'); ?>
</html>