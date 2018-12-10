<?php include 'includes/config.php'?>
<?php //include 'header.php'
?>
<?php get_header();?>

<form>
  <p> Legally defined as:</p>
  <div>
    <input type="radio" id="contactChoice1"
     name="contact" value="email">
    <label for="contactChoice1">Email</label>

    <input type="radio" id="contactChoice2"
     name="contact" value="phone">
    <label for="contactChoice2">Phone</label>

    <input type="radio" id="contactChoice3"
     name="contact" value="mail">
    <label for="contactChoice3">Mail</label>
  </div>
  


  <p>Show checkboxes:</p>
  <div>
    <input type="checkbox" name="vehicle1" value="Bike"> I have a bike<br>
    <input type="checkbox" name="vehicle2" value="Car"> I have a car<br>
    <input type="checkbox" name="vehicle3" value="Boat"> I have a boat<br><br>
  </div>



  First name:<br>
  <input type="text" name="firstname"><br>
  Last name:<br>
  <input type="text" name="lastname">
 

<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Message</label>
    <textarea rows="5" class="form-control" placeholder="Message" id="message" name="Message" required data-validation-required-message="Please enter a message."></textarea>
    <p class="help-block text-danger"></p>
  </div>
</div>

  <div>
    <button type="submit">Submit</button>
  </div>

</form>

<?php get_footer();?>