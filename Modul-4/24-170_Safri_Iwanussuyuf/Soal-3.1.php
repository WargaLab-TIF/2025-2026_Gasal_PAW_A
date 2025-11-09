<?php

function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/"; 
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        $errors[$field_name] = 'required';
    else if (!preg_match($pattern, $field_list[$field_name]))
        $errors[$field_name] = 'invalid';

}

$errors = array();
if (isset($_POST['submit'])) {
    validateName($errors, $_POST, 'surname');
    if ($errors){
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error)
            echo "$field $error</br>";
}else{
    echo 'Form submitted successfully with no errors';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <legend>Person details</legend>
    <form name="myForm" action="Soal-3.1.php" method="post">
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname">
        </div>
        <div class="field">
            <label for="email">email address</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="field">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="field">
            <label for="address">Street address</label>
            <textarea  name="address" id="address" rows="3" cols="22"></textarea>
        </div>
        <div class="field">
            <label for="state">State</label>
            <select name="state" id="state">
                <option value="1">Australian Capital Teritory</option>
                <option value="2">Queensland</option>
                <option value="3">Victoria</option>
                <option value="4">New south wales</option>
                <option value="5">Tazmania</option>
                <option value="6">South australia</option>
                <option value="7">Western australia</option>
                <option value="8">Northern australia</option>
            </select>
        </div>
        <div class="field">
            <input type="hidden" name="country" value="Australia">
        </div>   
        <div class="field">
            <label for="gender">gender</label>
            <input type="radio" name="gender" value="male">male
            <input type="radio" name="gender" value="female">female
        </div>   
        <div class="field">
            <label for="vegetarian">Vegetarian</label>
            <input type="checkbox" name="vegetarian">
        </div>   
        <div class="field">
            <input type="submit" name="submit" value="Submit"><input type="reset" value="Reset" name="reset">
        </div>   
    </form>
</body>
</html>