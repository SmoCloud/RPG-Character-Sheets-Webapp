<?php
  session_start();
  require_once 'auth.php';

  // Check if user is logged in
  if (!is_logged_in()) {
      header('Location: login.php');
      exit;
  }
  if(isset($_POST['logout']) && $_POST['logout']) {
    logout_user();
    header('Location: login.php');
    exit;
  }

  $host = 'localhost'; 
  $data = 'characters'; 
  $user = 'guest'; 
  $pass = '';
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
  $opts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
  ];

  try {
    $pdo = new PDO($attr, $user, $pass, $opts);
  }
  catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Basic RPG - Character Sheet Management - Version 3.5.2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" type="text/css"/>
</head>
<body>
  <section class="border">
    <div class="searchbar">
      <form action="index.php" method="POST" class="search-form">
        <input type="submit" value="Search">
        <input type="text" id="search" name="search" required>
      </form>
    </div>
    <div class="navbar">
      <form action="index.php" method="post">
        <button type="submit" name="logout" value="true">Logout</button>
        <button type="submit" name="create-sheet" value="true">Create RPG Sheet</button>
        <button type="submit" name="gallery" value="true">Your Sheet Gallery</button>
      </form>
    </div>
  </section>
  <div class="hero-section">
    <h1 class="hero-title" style="text-align: center;">RPG Character Sheet Management System</h1>
    <h2 class="hero-subtitle" style="text-align: center;"><?php echo $_SESSION['username']."'s Game History";?></h2>
  </div>
  <div class="game-selection">
    <table>
      <form action="index.php" method="post">
        <tr>
          <td>
            <input type="hidden" name="D&D" value="D&D"/>
            <button type="submit" class="d&d-btn"><img src="imgs/d&d_sheets.jpg"/></button>
          </td>
          <td>
            <h2>Dungeons & Dragons - 5e Character Sheet (Basic)</h2>
            <br>
            <hr>
            <p>
              Create a character sheet for Dungeons and Dragons - 5th Edition. This is a basic character sheet that only contains the core stats.
              The optional character details and chracter spellcasting sheets are (currently) not available.
            </p>
          </td>
        </tr>
      </form>
    </table>
  </div>
  <div class="pdf-toolbar">
   <div id="navigation_controls">
      <button class="pdf-toolbar-button" id="previous">Previous</button>
      <input class="pdf-input" id="current_page" value="1" type="number"/>
      <button class="pdf-toolbar-button" id="next">Next</button>
    </div>

   <div id="zoom_controls">  
     <button class="pdf-toolbar-button" id="zoom_in">+</button>
     <button class="pdf-toolbar-button" id="zoom_out">-</button>
    </div>
  </div>
  <div id = "canvas_container">
   <canvas id = "pdf_renderer"> </canvas>
</div>
  <?php
  
  ?>
</body>
<script
</html>
<?php // session_unset(); session_destroy(); ?>