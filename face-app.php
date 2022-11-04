<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face App</title>
</head>
<body>
    <h1>Face App</h1>

    <form method="post">

        <label for="rSize">Select Photo Size: </label>
        <input type="range" name=rSize id="rSize" step="10" min="100" max="1000"><br>

        <label for="clrBorder">Select Border Color: </label>
        <input type="color" name="clrBorder" id="clrBorder">

        <button type="submit" name="btnOkay" id="btnOkay">Okay</button><br><br>

    </form>

        
        
     <?php 
        if(isset($_POST['rSize'])){
            $color = $_POST['clrBorder'];
            $size = $_POST['rSize'];
        }
        else{
            $color = "black";
            $size = 500;
        }
            echo '<img src="img/MarkRaven.jpg" width="'.$size.'px" alt="my image" style="border: 5px solid '.$color.';">';
        ?>

</body>
</html>