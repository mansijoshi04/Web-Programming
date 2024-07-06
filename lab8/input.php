<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>

<section style="display: flex;">
    <!-- Left side form -->
    <form id="inputForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="flex: 1;">
        <br><label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="telephone_number">Telephone Number:</label>
        <input type="number" id="telephone_number" name="telephone_number" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="birth_day">Birth Day:</label>
        <input type="date" id="birth_day" name="birth_day" required><br><br>

        <label>Occupation:</label>
        
        <input type="radio" id="student" name="occupation" value="Student" required>
        <label for="student">Student</label>
        
        <input type="radio" id="doctor" name="occupation" value="Doctor" required>
        <label for="doctor">Doctor</label>
       
        <input type="radio" id="farmer" name="occupation" value="Farmer" required>
        <label for="farmer">Farmer</label>
        
        <input type="radio" id="engineer" name="occupation" value="Engineer" required>
        <label for="engineer">Engineer</label><br><br>

        <label for="favorite_sport">Favorite Sport:</label>
        <select id="favorite_sport" name="favorite_sport" required>
         <option value="" disabled selected>Select a sport</option>
         <option value="Hockey">Hockey</option>
         <option value="Football">Football</option>
         <option value="Carling">Carling</option>
         <option value="Tennis">Tennis</option>
        </select><br>

     <button type="submit">Submit</button>
    </form>
    
    <!-- Right side display results -->
    <div id="result-container" style="flex: 1;"></div>
</section>

<script>
    // JavaScript to update the right side with the form contents
    document.getElementById('inputForm').addEventListener('submit', function (event) {
        event.preventDefault();
        
        // Get form data
        var formData = new FormData(this);

        // Display form contents on the right side
        var resultContainer = document.getElementById('result-container');
        resultContainer.innerHTML = '<h2>Form Contents</h2>';
        
        formData.forEach(function(value, key){
            resultContainer.innerHTML += '<p><strong>' + key.replace('_', ' ') + ':</strong> ' + value + '</p>';
        });
    });
</script>

<?php include 'footer.php'; ?>
