<?php include_once('header.php'); ?>
<main>
  <h2>Select what kind of form you you would like to submit!</h2>
    <div id="formselect">
        <form>
            <label for="form_type">Select Form Type:</label>
            <select id="form_type" name="form_type">
                    <option value="none">None</option>
                  <option value="feedback">Feedback Form</option>
                 <option value="help_request">Help Request Form</option>
            </select>
        </form>
    
      </div>
    <div id="none_option">
    </div>

  <div id="feedback_form" style="display: none;">
    <form action="form-to-email.php" method="post">
        <label id="Feedback">Questions, comments, concerns, please use the form below for any and all feedback! <br><u style="color: rgb(197, 37, 37);"></u></label><br>
        <input type="hidden" name="ToAddress" value="torresla960@gmail.com">
        <input type="hidden" name="CCAddress" value="">
        <input type="hidden" name="Subject" value="WSD: Assignment 3 - Feed back Web Form for Luis Torres">
        
        <fieldset class="required">
          <legend>Name</legend>
          <label>Your Name:</label><input type="text" name="feedback_name" id="feedback_name">
        </fieldset>
        
        <fieldset class="required">
          <legend>Your Email</legend>
          <label>Email:</label><input type="email" name="From" id="email">
        </fieldset>
        
        <fieldset class="required">
          <legend>Address</legend>
          <label>Street: <input type="text" name="address_street" id="Street"><br></label><br>
          <label>City: <input type="text" name="address_city" id="City"></label>
          <label>State: <input type="text" name="address_state" id="State" maxlength="2" size="2"></label>
          <label>Zip: <input type="text" name="address_zip" id="Zip" maxlength="5" size="5"></label>
        </fieldset>
        
        <fieldset class="required">
          <legend>Enter Comments Below:</legend>
          <textarea name="feedback" id="comments" cols="80" rows="5" placeholder="I love the site it's perfect!!!"></textarea>
        </fieldset>
        
        <fieldset class="required">
          <legend>Rate the site! on a scale from 1 to 5</legend>
          <label>1 <input type="radio" name="rating" id="rate1" value="1" class="rate"></label>
          <label>2 <input type="radio" name="rating" id="rate2" value="2" class="rate"></label>
          <label>3 <input type="radio" name="rating" id="rate3" value="3" class="rate"></label>
          <label>4 <input type="radio" name="rating" id="rate4" value="4" class="rate"></label>
          <label>5 <input type="radio" name="rating" id="rate5" value="5" class="rate"></label>
        </fieldset>
        
        <label>
          Submit Form <input type="submit" id="submit" name="Submit">
        </label>
        
        <label>
          Reset Form <input type="reset" id="rset" name="Reset">  
        </label>
        
      </form>    
  </div>
 
    <div id="help_request" style="display: none;">
    <form action="form-to-email-help.php" method="post">
    <label id="help">What may I help you with? <br><u style="color: rgb(197, 37, 37);"></u></label><br>
    <input type="hidden" name="ToAddress" value="torresl1896@gmail.com">
    <input type="hidden" name="CCAddress" value="">
    <input type="hidden" name="Subject" value="M3 Help Request form">
    <fieldset class="required">
      <legend>Name</legend>
      <label>Your Name:</label><input type="text" name="name" id="name" required>
    </fieldset>
    <fieldset class="required">
      <legend>Your Email</legend>
      <label>Email:</label><input type="email" name="From" id="help_email" required>
    </fieldset>
    <fieldset class="N_required">
      <legend>Address</legend>
      <label>Street: <input type="text" name="address_street" id="help_Street" required><br></label><br>
      <label>City: <input type="text" name="address_city" id="help_City" required></label>
      <label>State: <input type="text" name="address_state" id="help_State" maxlength="2" size="2" required></label>
      <label>Zip: <input type="text" name="address_zip" id="help_Zip" maxlength="5" size="5" required></label>
    </fieldset>
    <fieldset class="N_required" id="phoneField">
      <legend>Number</legend>
      <label><input type="tel" name="Phone" id="Phone" required><br></label><br>
    </fieldset>
    <fieldset class="required">
      <legend>Enter Questions Below:</legend>
      <textarea name="feedback" id="help_comments" cols="80" rows="5" required></textarea>
    </fieldset>
    <fieldset class="required">
      <legend>What is the best way to reach you?</legend>
      <label for="contact_phone" onclick="handleContactRadioChange()">
        <input type="radio" name="contact" id="contact_phone" value="Phone" class="contact" required>Phone
      </label>
      <label for="contact_email">
        <input type="radio" name="contact" id="contact_email" value="contact_email" class="contact" required>Email
      </label>
      <label for="contact_both">
        <input type="radio" name="contact" id="contact_both" value="contact_both" class="contact" required>Both
      </label>
    </fieldset>
    <div id="help_form_butons">
      <input type="submit" id="help_submit">  
      <input type="reset" id="help_rset">
    </div>      
  </form>
    </div>

    <script>
    document.getElementById('form_type').addEventListener('change', function() {
      var selectedForm = this.value;
    
      // Hide all forms initially
      document.getElementById('feedback_form').style.display = 'none';
      document.getElementById('help_request').style.display = 'none';
    
      // Display the selected form
      if (selectedForm === 'feedback') {
        document.getElementById('feedback_form').style.display = 'block';
      } else if (selectedForm === 'help_request') {
        document.getElementById('help_request').style.display = 'block';
      }
    });
  
    function validateForm() {
      var selectedForm = document.getElementById('form_type').value;
      var isValid = true;
  
      if (selectedForm === 'feedback') {
        var requiredFields = document.querySelectorAll('#feedback_form .required input, #feedback_form .required textarea');
        requiredFields.forEach(function(field) {
          if (field.value.trim() === '') {
            isValid = false;
            field.style.border = '1px solid red';
          } else {
            field.style.border = ''; // Reset border style if field is filled
          }
        });
      } else if (selectedForm === 'help_request') {
        var requiredFields = document.querySelectorAll('#help_request .required input, #help_request .required textarea');
        requiredFields.forEach(function(field) {
          if (field.value.trim() === '') {
            isValid = false;
            field.style.border = '1px solid red';
          } else {
            field.style.border = ''; // Reset border style if field is filled
          }
        });
      }
  
      if (!isValid) {
        alert('Please fill out all required fields.');
      }
  
      return isValid;
    }
  
    // Attach the validation function to the form submission
    document.getElementById('feedback_form').addEventListener('submit', function(event) {
      if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
      } else {
        // Form is valid, allow submission to PHP
        // You can add any additional actions here if needed
      }
    });
    document.getElementById('help_request').addEventListener('submit', function(event) {
      if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
      } else {
        // Form is valid, allow submission to PHP
        // You can add any additional actions here if needed
      }
    });
  </script>

</main>
<?php include_once('footer.php'); ?>