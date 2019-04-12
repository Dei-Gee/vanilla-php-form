<?php
    $name = "";
    $email = "";
    $color = "";

    function matchRegEx($input)
    {
        if(!preg_match("/^[a-z0-9\040\.\-]+$/i", $input)){
            return "(invalid! Please Enter only alphabets and not numbers or symbols)";
        }
        else{
            return "Welcome ".$input;
        }
    }

    function checkColor($col){
        if(empty($col) || $col == ""){
            return "You did not pick a color";
        }
        else{
            return "You chose the color: <span id='dot' style='background-color: $col;'></span>$col";
        }
    }

    if(isset($_POST['submit']))
    {
        $name = matchRegEx($_POST['name']);
        $email = $_POST['email'];
        $showColor = checkColor($_POST['color']);

        echo "
            <script>
                window.onload=function(){
                    function onSubmit() {
                        var output = document.getElementById('output');
                        output.style.display = 'block';
                    }
                    
                    var myForm = document.getElementById('myForm');
                    myForm.addEventListener('submit', onSubmit);
                }
            </script> 
        ";
    }
    else
    {
        echo "
        <script>
            window.onload=function(){
                var output = document.getElementById('output');
                output.style.display = 'none';
            }
        </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Basic HTML Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header>
            <h1>Basic Form Validation</h1>
        </header>
        <form action="" method="post" id="myForm">
            <div>
                <div class="label">
                    <label for="name">Name: </label> 
                </div>
                <div class="input">
                    <input type="text" name="name" id="name" placeholder="Please enter your name here" required>
                </div>
            </div>

            <div>
                <div class="label">
                    <label for="email">Email: </label> 
                </div>
                <div class="input">
                    <input type="email" name="email" id="email" placeholder="Please enter your email here" required>
                </div>
            </div>

            <div>
                <div class="label">
                    <label for="color">Color: </label> 
                </div>
                <div class="input">
                    <select name="color" id="color">
                        <option value="">Please pick a color</option>
                        <option value="red">Red</option>
                        <option value="orange">Orange</option>
                        <option value="yellow">Yellow</option>
                        <option value="green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="indigo">Indigo</option>
                        <option value="violet">Violet</option>
                    </select>
                </div>
            </div>

            <div class="last">
                <input type="submit" name="submit" id="submit" value="Submit">
            </div>
        </form>

        <div id="output">
            <div><?php echo $name; ?></div>
            <br>
            <div>Your email address is: <?php echo $email; ?></div>
            <br>
            <div><?php echo $showColor; ?></div>
        </div>
    </body>
</html>
<style>
    header {
        width: 100%;
    }

    header > h1{
        margin: 0 auto;
        text-align: center;
    }

    form, form div {
        margin: 0 auto;
        display: flex;
    }

    form {
        width: 80%;
        flex-direction: column;
    }

    form div {
        display: flex;
        flex-direction: row;
        width: 50%;
    }

    .label{
        width: 5%;
        padding: 1rem;
    }

    .input{
        width: 95%;
        padding: .75rem;
    }

    .input  input, .input select{
        width: 100%;
    }

    .last{
        margin-top: 1rem;
    }

    .last > input{
        margin: 0 auto;
        padding: 1rem;
        background-color: white;
        text-align: center;
        box-shadow: none;
        border: 1px solid black;
        cursor: pointer;
    }

    #dot {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
        position: relative;
        top: 3px;
    }

    #output > span{
        padding: 1rem;
    }
</style>