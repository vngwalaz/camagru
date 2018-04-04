<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/camera.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Camera</title>
</head>
<body class="main-cam">
    <center>
        <div class="imput-form">
        <video autoplay="true" id="video"> </video>
        <img id="myImg" src="#" />
        <br/><br/>
        <input type='file' id="imgInp" />
    
        <br/><br/>
    
        <form method="post" action="upload.php">
                <label>
                    <input  type="radio" name="choice" value="funny-glasses"  onclick="check()" />
                    <img class="choiceImg" src="../img/funny-glasses.png">
                </label>
            <input type="hidden" name="imgData" id="imgData" />
            <input type="submit" disabled="disabled" value="Choose a picture" id="startbutton" />
        </form>
    
        <canvas id="canvas"></canvas>
        <?php
        if (file_exists("img/photos/newImg.png"))
            echo "<img src='img/photos/newImg.png' id='photo' alt='photo'>";
        ?>
    
    </div>
    <script src="webcam.js"> </script>
            <div>
                <form padding-left;"5px" action="profile2.php" methpd="POST">
                    <button type="submit" name="camera">Upload</button>
                    <p class="text"><a href="profile2.php" color="red">BACK</a></p>
                </form>
            </div>
        </div>
    </center>
</body>
</html>