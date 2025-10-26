<legend>Person details</legend>
<form name="myForm" action="processData_form.php" method="post">
<div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '' ?>">
        </div>
        <div class="field">
            <label for="email">email address</label>
            <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
        </div>
        <div class="field">
            <label for="password">password</label>
            <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
        </div>
        <div class="field">
            <label for="address">Street address</label>
            <textarea name="address"><?php echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
        </div>
        <div class="field">
            <label for="state">State</label>
            <select name="state" id="state">
                <option value="1" <?php if(isset($_POST['state']) && $_POST['state']=="1") echo "selected"; ?>>Australian Capital Territory</option>
                <option value="2" <?php if(isset($_POST['state']) && $_POST['state']=="2") echo "selected"; ?>>Queensland</option>
                <option value="3" <?php if(isset($_POST['state']) && $_POST['state']=="3") echo "selected"; ?>>Victoria</option>
                <option value="4" <?php if(isset($_POST['state']) && $_POST['state']=="4") echo "selected"; ?>>New south wales</option>
                <option value="5" <?php if(isset($_POST['state']) && $_POST['state']=="5") echo "selected"; ?>>Tazmania</option>
                <option value="6" <?php if(isset($_POST['state']) && $_POST['state']=="6") echo "selected"; ?>>South australia</option>
                <option value="7" <?php if(isset($_POST['state']) && $_POST['state']=="7") echo "selected"; ?>>Western australia</option>
                <option value="8" <?php if(isset($_POST['state']) && $_POST['state']=="8") echo "selected"; ?>>Northern australia</option>
            </select>
        </div>
        <div class="field">
            <input type="hidden" name="country" value="Australia">
        </div>   
        <div class="field">
            <label for="gender">gender</label>
            <input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender']=="male") echo "checked"; ?>>male
            <input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender']=="female") echo "checked"; ?>>female
        </div>   
        <div class="field">
            <label for="vegetarian">Vegetarian</label>
            <input type="checkbox" name="vegetarian" <?php if(isset($_POST['vegetarian'])) echo "checked"; ?>>
        </div>   
        <div class="field">
            <input type="submit" name="submit" value="Submit"><input type="reset" value="Reset" name="reset">
        </div>
    </form>
