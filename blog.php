<?php
 session_start();
 if(!isset($_SESSION['mail']))
 {
	 header("location:log.php");
 }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blog page</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="blogcss.css" rel="stylesheet">
	<link href="tutorialcss.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.rig
		{
		padding:10px;
		margin-top:20px;
		margin-right:50px;
		}
		.atag
		{
		color:white;
		}
		.but
		{
		 margin-left:0px;
		 padding:10px;
		}
		.rowpad
		{
		 padding-left:40px;
		 padding-top:0px;
		}
		.mailpad{margin-top:5px;}
		.comment{color:black;}
		.imagep{margin-right:20px;}
	</style>
  </head>
  <body>
  <nav class="navbar navbar-default s">
	<div class="container-fluid ">
	<img src="blueelearn.png">
	<ul class="nav navbar-nav navbar-right margin-top cl-effect-2">
		<li><a href="tutorial.php"><span data-hover="Home">Home</span></a></li>
		<li><a href="aboutus.php"><span data-hover="About Us">About us</span></a></li>
		<li class="dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tutorials <span class="caret" ></span></a>
        <ul class="dropdown-menu">
          <li><a href="btech.php">B.Tech</a></li>
          <li><a href="degreemainpage.php">Degree</a></li>
        </ul>
      </li>
	  <li><a href="blog.php"><span data-hover="Blog">Blog</span></a></li>
	  <li><a href="logout.php"><span data-hover="Logout">Logout</span></a></li>
	</ul>
	</div>
  </nav>
	<nav class="navbar navbar-default space">
	<div class="container">
			<div class="nav navbar-nav navbar-left">
				<button type="button" class="btn btn-info rig"><a href="query.php" class="atag">Ask Question</a></button>
				<button type="button" class="btn btn-info rig "><a href="online.php" class="atag">Friends</a></button>
			</div>
	</div>
	</nav>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php
				include "connection.php";
				$sql="select * from question";
				$sql1="select * from register where mail='$_SESSION[mail]'";
                $result=mysqli_query($con,$sql1);
                $row1=mysqli_fetch_array($result);
				if($res=(mysqli_query($con,$sql)))
				 {
					if(mysqli_num_rows($res)>0)
					{
						while($row=mysqli_fetch_array($res))
						{
							?>
							<div class="jumbotron but">
							<?php 
								  echo "Posted-by";
								  echo "<a>";
								  echo "   ".$row['fid'] ;
								  echo "</a>";
							      echo "  on  \t \t";
								  echo $row['date'];
								  echo "<br><div class='row mailpad'><a><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								  echo $row['mail']."</div>" ;
								  $a=$row['tittle'];	
								  echo "<a href='#'><h4>";
								  echo $a."</a></h4>";
								  echo '<div class="row"><img class="imagep" src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'" align="left" width="100" height="100"/>';
							      echo "<h5>";
								  echo  "&nbsp;&nbsp;".$row['textarea'];echo "</h5></div>";
								  echo "</a></b><br>";
								  echo "<div class='row rowpad'>";
                                  echo "<i class='fa fa-thumbs-o-up'  style='font-size:20px; color:blue;' onClick='count()'></i>&nbsp;&nbsp;Likes";
								  echo " "."<a href='#' id='demo'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							      echo "<i class='fa fa-thumbs-o-down'  style='font-size:20px; color:blue;' onClick='count()'></i>&nbsp;&nbsp;Dislikes";
								  echo"<i class='fa fa-comments' style='color:blue;font-size:20px; margin-left:30px;'></i>";
								  echo "<a href='comment.php?id=".$row['id']."&user_id=".$row1['user_id']."' style='font-size:15px; color:black'>&nbsp;comment</a>";
                                  echo "</div>";?>
								</div>
						<?php
						}
					}
				 }
								
			?>
					
</div>
<div class="col-md-3">
<?php
   $sql="select * from question";
	if($res=(mysqli_query($con,$sql)))
	 {
	    if(mysqli_num_rows($res)>0)
	        {
               	while($row=mysqli_fetch_array($res))
				{
					
					echo "<h4><a href='#'>".$row['tittle']."</a><br></h4>";
				}
			}
	 }
	 ?>
	 </div>
	 </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
