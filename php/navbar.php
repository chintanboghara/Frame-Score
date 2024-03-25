
<?php if(isset($_SESSION['username'])){
    ?><a href="logout.php"><button class="btn btn-primary">log out</button></a>
    <div><?= $_SESSION['username']?></div>
<?php}else{?>
    <a href="../html/sign-in.html"><button class="btn btn-primary">Sign in</button></a>
<?php}?>
