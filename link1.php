<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<html>
<head>
<meta charset="utf-8">
<title>shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="Assets/styles/styles.css" rel="stylesheet" type="text/css">
</head>
<style>
body {
background-color: #FFF6EA
}
</style>

<body >
<div id="mainWrapper">
  <header>
       <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p><h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong> </h1></p>
  <?php endif ?>
    <div id="headerLinks"><a href="login.php" title="Login/Register">Login/Register</a><a href="cart_detail.php" title="Cart">Cart</a><a href="index.php?logout='1'" style="color: red;">logout</a></div>
  </header>
  <section id="offer"> 
    <h2>OFFER 100%</h2>
    <p>NEW ARRIVAL</p>
  </section>

  <div id="content">
    <section class="sidebar"> 
      <input type="text"  id="search" value="search">
      <div id="menubar">
        <nav class="menu">
          <h2>MENU ITEM 1 </h2>
          <hr>
          <ul>
            <!-- List of links 1 -->
            <li><a href="index.php" title="Link">เสื้อ</a></li>
            <li><a href="link1.php" title="Link">กางเกง</a></li>
            <li><a href="link2.php" title="Link">หมวก</a></li>
            <li class="notimp"><a href="link3.php"  title="Link">ถุงกระดาษ</a></li>
            <li><a href="index.php?logout='1'" style="color: red;">logout</a></li>
          </ul>
        </nav>
      </div>
    </section>
    <br>
    <br>
    <section class="mainContent"> 
    <table width="80%" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("connect.php");
  $sql = "select * from product2 order by p_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='img/" . $row["p_pic"] ." ' width='80'></td>";
	echo "<td align='left'>" . $row["p_name"] . "</td>";
    echo "<td align='center'>" .number_format($row["p_price"],2). "</td>";
    echo "<td align='center'><a href='product_detail1.php?p_id=$row[p_id]'>คลิก</a></td>";
	echo "</tr>";
  }
  ?>
</table>
    <p>&nbsp;</p>
    </section>
  </div>
  <footer> 
    <div>
      <p>.................................</p>
    </div>
    <div>
      <p>.................................</p>
    </div>
    <div class="footerlinks">
      <p><a href="index.php" title="Link">Home</a></p>
      <p><a href="cart_detail.php" title="Link">Cart</a></p>
      <p>&nbsp;</p>
    </div>
  </footer>
</div>
</div>
</body>
</html>