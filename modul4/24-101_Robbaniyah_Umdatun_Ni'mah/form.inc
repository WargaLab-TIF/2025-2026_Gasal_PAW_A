<form name="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <fieldset>
        <legend>Person Details</legend>

        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" />
        </div>

        <div class="field">
            <label for="email">Email address</label>
            <input type="text" name="email" id="email" />
        </div>

        <div class="field">
            <label for="passwd">Password</label>
            <input type="password" name="passwd" id="passwd" />
        </div>

        <div class="field">
            <label for="address">Street Address</label>
            <textarea name="address" id="address" rows="3"></textarea>
        </div>

        <div class="field">
            <label for="state">State</label>
            <select name="state" id="state">
                <option value="">[choose your state]</option>
                <option value="ACT">Australian Capital Territory</option>
                <option value="QLD">Queensland</option>
                <option value="VIC">Victoria</option>
                <option value="NSW">New South Wales</option>
                <option value="TAS">Tasmania</option>
                <option value="SA">South Australia</option>
                <option value="WA">Western Australia</option>
                <option value="NT">Northern Territory</option>
            </select>
        </div>

        <input type="hidden" name="country" value="Australia" />

        <div class="field">
            <label>Gender</label>
            <div class="radio-group">
                <input type="radio" name="sex" id="male" value="male" />
                <label for="male">Male</label>

                <input type="radio" name="sex" id="female" value="female" />
                <label for="female">Female</label>
            </div>
        </div>

        <div class="field">
            <div class="checkbox-group">
                <label for="vegetarian">Vegetarian?</label>
                <input type="checkbox" name="vegetarian" id="vegetarian" value="Yes" />
            </div>
        </div>

        <div class="buttons">
            <input type="submit" value="Submit" name="submit" />
            <input type="reset" value="Reset" name="reset" />
        </div>

    </fieldset>
</form>