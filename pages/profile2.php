<?php
    include_once '../resources/session.php';
    include_once '../database/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>user profile</title>
</head>
<section>
<body class="main-wrap">
<link href="../css/profile.css" rel="stylesheet">
<script src="../js/profile.js"></script>
    <header class="feed-header" >
        <div class="search">
            <form action="../index.php" method="POST">
                <input type="text" name="search" placeholder="Search" autocomplete="off">
                <button type="submit" name="search">Search</button>
            </form> 
        </div>
        <form padding-left;"5px" action="../index.php" methpd="POST">
            <button type="submit" name="logout">logout</button>
        </form>
    </header>
    <header>
        <center>
            <div>
                <td>
                <form action="profile2.php" methpd="POST">
                    <button type="submit" name="Home">Home</button>
                </form>
                </td>
                <form action="profile2.php?=gallery" methpd="POST">
                    <button type="submit" name="gallery">Gallery</button>
                </form>
                <form action="profile2.php?=accountDetails" methpd="POST">
                    <button type="submit" name="settings">Settings</button>
                </form>
            </div>
        </center>
    </header>
    <?php
        if (isset($_SESSION['user_id']) && $_GET['page'] != 'gallery') {
	    if ($_GET['page'] == 'account') {
		    include_once('account.php');
	    } else {
		    $users5LastPhotos = query_db("SELECT path AS src FROM photos WHERE id_user='{$_SESSION['user_id']}' ORDER BY date_creation DESC LIMIT 5", $BDD);
    ?>
    <div id="miniatures">
	    <?php
		    if (!empty($users5LastPhotos)) {
			    foreach ($users5LastPhotos as $miniature) {
				    echo "<img src='img/photos/{$miniature['src']}' class='miniature' />";
			    }
		    }
        ?>
    <!-- user profile information shands-->
    <div class="profile-user">
        <div class="row-fluid">
            <div class="span6">
            <form action="proPic.html" methpd="POST">
              <div class="pull-left" style="margin-right:15px">
                    <img src="../img/user2.png" class="img-polaroid"/>
              </div>
              <button type="submit" name="camera">change</button>
            </form>
                <p class="text">username wil go here_> <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> username</p>
                <h2>BLAZE_NOSIPHO</h2>
                <p class="text">
                    <strong>Nosipho Blaze</strong>
                </p>
            </div>
            <div class="text">
                <ul class="inline user-counts-list">
                    <li>Photos <span class="count">100</span></li>
                    <li>Followers <span class="count">50</span></li>
                    <li>Following <span class="count">130</span></li>
                </ul>
            </div>
        </div>
        <div class="search">
            <form padding-left;"5px" action="webcam.html" methpd="POST">
                <button type="submit" name="camera">Take a Picture</button>
            </form>
        </div>
    </div>
<td>
<div class="feed-photos">
  <div id="image-table">
        <table>
            <tr>
                <td style="padding:5px">
                    <img src="../img/placeholder.png" height="200" width="200">
                    <div class="meta">
                        <i class="icon-heart"></i> like
                        <i class="icon-comment"></i> comment
                    </div>
                    <p><a href="https://www.mrp.com/">like</a></p>
                </td>
                <td style="padding:5px">
                    <img src="../img/placeholder.png" height="200" width="200">
                    <div class="meta">
                        <i class="icon-heart"></i> like
                        <i class="icon-comment"></i> comment
                    </div>
                    <p><a href="http://www.hm.com/za">like</a></p>
                </td>
            </tr>
            <td style="padding:5px">
            <img src="../img/placeholder.png" height="200" width="200">
            <div class="meta">
                <i class="icon-heart"></i> like
                <i class="icon-comment"></i> comment
              </div>
          <p><a href="https://www.mrp.com/">like</a></p>
        </td>
        <td style="padding:5px">
            <img src="../img/placeholder.png" height="200" width="200">
            <div class="meta">
                <i class="icon-heart"></i> like
                <i class="icon-comment"></i> comment
              </div>
          <p><a href="http://www.hm.com/za">like</a></p>
        </td></tr>
    </table>
  </div>
</div>
</td>
</body>
</html>