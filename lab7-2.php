<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lab 07</title>
    </head>
    <body>
        <?php 
            $nameErr = $typeErr = $zipcodeErr = $priceErr = "";
            $name = $type = $zipcode = $price = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name must not be empty";
                } else {
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["name"])) {
                        $nameErr = "Only letters, spaces, dashes and quotes are allowed";
                    }
                    else $name = transform_data($_POST["name"]);
                }
                if (empty($_POST["type"])) {
                    $typeErr = "Type must not be empty!";
                } else {
                    $type = transform_data($_POST["type"]);
                }
                if (empty($_POST["zipcode"])) {
                    $zipcodeErr = "Zip code must not be empty!";
                } else {
                    if (!preg_match("/^[0-9-]*$/", $_POST["zipcode"])) {
                        $zipcodeErr = "Only numbers and dashes!";
                    }
                    else $zipcode = transform_data($_POST["zipcode"]);
                }
                if (empty($_POST["price"])) {
                    $priceErr = "Price must not be empty";
                } else {
                    if (!preg_match("/^[0-9\.]*$/", $_POST["price"])) {
                        $priceErr = "Only numbers and dots allowed";
                    }
                    else $price = transform_data($_POST["price"]);
                }
            }
            function transform_data($data)
            {
                $data = trim($data); // Remove unnecessary characters (extra space, tab, new line) from $data
                $data = stripslashes($data); // Remove backslashes (\) from $data
                $data = htmlspecialchars($data); // converts special characters to HTML entities        
                return $data;
            }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Enter hardware name: </label>
            <input type='text' id='name' name="name">
            <span class="error">
                <?php echo $nameErr; ?>
            </span>
            <br>
            <label for="type">Enter hardware type: </label>
            <select type='text' id='type' name="type">
                <option value="RAM">RAM</option>  
                <option value="Hard disk">Hard disk</option>  
                <option value="Monitor">Monitor</option>  
                <option value="CPU">CPU</option>  
                <option value="Mouse">Mouse </option>  
                <option value="Keyboard">Keyboard</option>  
                <option value="Printer">Printer</option>  
            </select>
            <span class="error">
                <?php echo $typeErr; ?>
            </span>
            <br>
            <label for="zipcode">Enter hardware zipcode: </label>
            <input type='text' id='zipcode' name="zipcode">
            <span class="error">
                <?php echo $zipcodeErr; ?>
            </span>
            <br>
            <label for="price">Enter hardware price: </label>
            <input type='text' id='price' name="price">
            <span class="error">
                <?php echo $priceErr; ?>
            </span>
            <br>
            <label for="image1">Image1</label>
            <input id= "image1" type="checkbox" name="image1" value="im1">
            <label id= "image2" for="image2">Image2</label>
            <input type="checkbox" name="image2" value="im2">
            <br>
            <input type='submit' value='Send'>
        </form>
        <?php
            if(empty($nameErr) && empty($typeErr) && empty($zipcodeErr) && empty($priceErr)){
                echo "<h2>Your data:</h2>";
                echo $name;
                echo "<br>";
                echo $type;
                echo "<br>";
                echo $zipcode;
                echo "<br>";
                echo $price;
            }
            else{
                echo "<h2>Fill in required data!</h2>";
            }
            if(filter_has_var(INPUT_POST,'image1')) {
                echo "<img src=\"tree-736885__480.jpg\" alt=\"Flowers in Chania\">";
            }
            if(filter_has_var(INPUT_POST,'image2')) {
                echo "<img src=\"baobab-tree-at-sunset--african-landscape--calm--relaxing--tr.jpg\" alt=\"Flowers in Chania\">";
            }
        ?>
    </body>
</html>