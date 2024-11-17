<?php
  session_start();
  require_once 'auth.php';

  // Check if user is logged in
  if (!is_logged_in()) {
      header('Location: login.php');
      exit;
  }
  # Testing lab computer can change repo
  function editCharacter($id, $nm, $a, $g, $rc, $cl, $lvl) {
    echo <<<_END
      <div class="homes">
      <form action='index.php' method='post'>
      <pre>
        <table>
          <tr>
            <td>Name:</td>
            <td><input type='text' name='cname' placeholder=$nm value=$nm></td>
          </tr>
          <tr>
            <td>Age:</td>
            <td><input type='text' name='age' placeholder=$a value=$a></td>
          </tr>
          <tr>
            <td>Gender:</td>
    _END;
    // Gender update selector
    echo "<td><select name='gender' value='$g'>
      <option ";
    if($g === "male") echo "selected='selected'";
    echo "value='male'>Male</option>";
    echo "<option ";
    if($g === "female") echo "selected='selected'";
    echo "value='female'>Female</option>";
    echo "<option ";
    if($g === "other") echo "selected='selected'";
    echo "value='other'>Other</option></select></td></tr>";

    // Race update selector
    echo "<tr>
            <td>Race:</td>
          <td><select name='race' value='$rc'>
      <option ";
    if($rc === "human") {echo "selected='selected'";}
    echo "value='human'>Human</option>";
    echo "<option ";
    if($rc === "dwarf") {echo "selected='selected'";}
    echo "value='dwarf'>Dwarf</option>";
    echo "<option ";
    if($rc === "druid") {echo "selected='selected'";}
    echo "value='druid'>Druid</option>";
    echo "<option ";
    if($rc === "elf") {echo "selected='selected'";}
    echo "value='elf'>Elf</option>";
    if($rc === "orc") {echo "selected='selected'";}
    echo "value='orc'>Orc</option>";
    echo "<option ";
    if($rc === "gnome") {echo "selected='selected'";}
    echo "value='gnome'>Gnome</option>";
    echo "<option ";
    if($rc === "fairy") {echo "selected='selected'";}
    echo "value='fairy'>Fairy</option>";
    if($rc === "hobbit") {echo "selected='selected'";}
    echo "value='hobbit'>Hobbit</option>";
    echo "<option ";
    if($rc === "undead") {echo "selected='selected'";}
    echo "value='undead'>Undead</option></select></td></tr>";

    // Class update selector
    echo "<tr>
            <td>Class:</td>
          <td><select name='char-class' value='$cl'>
      <option ";
    if($cl === "fighter") {echo "selected='selected'";}
    echo "value='fighter'>Fighter</option>";
    echo "<option ";
    if($cl === "rogue") {echo "selected='selected'";}
    echo "value='rogue'>Rogue</option>";
    echo "<option ";
    if($cl === "assassin") {echo "selected='selected'";}
    echo "value='assassin'>Assassin</option>";
    echo "<option ";
    if($cl === "merchant") {echo "selected='selected'";}
    echo "value='merchant'>Merchant</option>";
    if($cl === "ranger") {echo "selected='selected'";}
    echo "value='ranger'>Ranger</option>";
    echo "<option ";
    if($cl === "barbarian") {echo "selected='selected'";}
    echo "value='barbarian'>Barbarian</option>";
    echo "<option ";
    if($cl === "cleric") {echo "selected='selected'";}
    echo "value='cleric'>Cleric</option>";
    echo "<option ";
    if($cl === "mage") {echo "selected='selected'";}
    echo "value='mage'>Mage</option>";
    echo <<<_END
            </select></td>
          </tr>
          <tr>
            <td>Level:</td>
            <td><input type="range" id="level" name="level" min="1" max="10" value='$lvl'> <output id="value"></output></td>
          <tr>
            <td><br><br>
              <input type='hidden' name='edit-id' value='$id'>
              <button id='update-btn' type='submit' name='update' value='Character Updated'>Character Updated</button>
            </td>
          </tr>
        </table>
      </pre>
      </form>
      </div>
    _END;
  };
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

  if (isset($_POST['delete']) && isset($_POST['cname'])) {
    $cname   = $pdo->quote($_POST['cname']);
    $query  = "DELETE FROM char_sheets WHERE cname=$cname";
    $result = $pdo->query($query);
  }
  elseif(isset($_POST['edit'])) {
    $_SESSION['edit'] = true;
  }
  elseif(isset($_POST['update'])) {
    session_unset();
    if (isset($_POST['cname']) &&
      isset($_POST['age']) &&
      isset($_POST['gender']) &&
      isset($_POST['race']) &&
      isset($_POST['char-class']) && 
      isset($_POST['level']) &&
      isset($_POST['edit-id'])) {
      $cname    = $pdo->quote($_POST['cname']);
      $age      = $pdo->quote($_POST['age']);
      $gender   = $pdo->quote($_POST['gender']);
      $race     = $pdo->quote($_POST['race']);
      $class    = $pdo->quote($_POST['char-class']);
      $level    = $pdo->quote($_POST['level']);
      $id       = $pdo->quote($_POST['edit-id']);
      
      $query    = "UPDATE char_sheets SET cname = $cname, age = $age, gender=$gender, race=$race, class=$class, level=$level WHERE id=$id";
      $result = $pdo->query($query);
    }
  }
  if (!isset($_POST['update']) && 
      isset($_POST['cname'])   &&
      isset($_POST['age']) &&
      isset($_POST['gender']) &&
      isset($_POST['race']) &&
      isset($_POST['char-class']) && 
      isset($_POST['level'])) {
    $cname    = $pdo->quote($_POST['cname']);
    $age      = $pdo->quote($_POST['age']);
    $gender   = $pdo->quote($_POST['gender']);
    $race     = $pdo->quote($_POST['race']);
    $class    = $pdo->quote($_POST['char-class']);
    $level    = $pdo->quote($_POST['level']);
    
    $query    = "INSERT INTO char_sheets (cname, age, gender, race, class, level) VALUES ($cname, $age, $gender, $race, $class, $level)";
    $result = $pdo->query($query);
  }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Basic RPG - Character Sheet Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="hero-section">
    <h1 class="hero-title" style="text-align: center;">Basic RPG</h1>
    <h2 class="hero-subtitle" style="text-align: center;">Character Sheet Management System</h2>
    <h4 style="text-align: center;">Version 2.2.3</h4>
    <div class="searchbar">
      <form action="index.php" method="POST" class="search-form">
        <input type="text" id="search" name="search" required>
        <input type="submit" value="Search">
      </form>
    </div>
  </div>
  <div class="container">
    <form action="index.php" method="post" autocomplete="off">
      <fieldset id="add">
        <legend>New Character Sheet</legend>
        <pre>
  Name: <input type="text" name="cname" required>

  Age:  <input type="text" name="age" required>

  Gender:<input type="radio" name="gender" value="male" required>Male   <input type="radio" name="gender" value="female">Female   <input type="radio" name="gender" value="other">Other

  Race:<input type="radio" name="race" value="human" required>Human   <input type="radio" name="race" value="dwarf">Dwarf    <input type="radio" name="race" value="druid">Druid
       <input type="radio" name="race" value="elf">Elf     <input type="radio" name="race" value="orc">Orc      <input type="radio" name="race" value="gnome">Gnome
       <input type="radio" name="race" value="fairy">Fairy   <input type="radio" name="race" value="hobbit">Hobbit   <input type="radio" name="race" value="undead">Undead

  Class:<input type="radio" name="char-class" value="fighter" required>Fighter    <input type="radio" name="char-class" value="rogue">Rogue
        <input type="radio" name="char-class" value="assassin">Assassin   <input type="radio" name="char-class" value="merchant">Merchant
        <input type="radio" name="char-class" value="ranger">Ranger     <input type="radio" name="char-class" value="barbarian">Barbarian
        <input type="radio" name="char-class" value="cleric">Cleric     <input type="radio" name="char-class" value="mage">Mage

  Level: <input type="range" id="level" name="level" min="1" max="10"/> <output id="value"></output></p>

        <button id="new-btn" type="submit" value="Character Sheet Created">Create Character Sheet</button>
        </pre>
      </fieldset>
    </form>
  </div>
  <fieldset id="roster">
    <legend>Character Roster</legend>
    <?php
      if(isset($_POST['search']) && !empty($_POST['search'])) {
        $search = $pdo->quote("%".$_POST['search']."%");
        $query  = "SELECT * FROM char_sheets WHERE cname like $search";
        $result = $pdo->query($query);

      } else {
        $query  = "SELECT * FROM char_sheets";
        $result = $pdo->query($query);
      }
      while ($row = $result->fetch()) {
        $id = htmlspecialchars($row['id']);
        $r0 = htmlspecialchars($row['cname']);
        $r1 = htmlspecialchars($row['age']);
        $r2 = htmlspecialchars($row['gender']);
        $r3 = htmlspecialchars($row['race']);
        $r4 = htmlspecialchars($row['class']);
        $r5 = htmlspecialchars($row['level']);
        if((isset($_SESSION['edit']) && isset($_POST['edit'])) && ($_SESSION['edit'] && $_POST['edit'] === $id)) { 
          editCharacter($id, $r0, $r1, $r2, $r3, $r4, $r5);
        } else {
          echo <<<_END
          <div class="homes">
          <form action='index.php' method='post'>
          <button id='delete-btn' type='submit' name='delete' value='Character Deleted'>
          <pre>
            <table>
              <tr>
                <td>Name:</td>
                <td>$r0</td>
              </tr>
              <tr>
                <td>Age:</td>
                <td>$r1</td>
              </tr>
              <tr>
                <td>Gender:</td>
                <td>$r2</td>
              </tr>
              <tr>
                <td>Race:</td>
                <td>$r3</td>
              </tr>
              <tr>
                <td>Class:</td>
                <td>$r4</td>
              </tr>
              <tr>
                <td>Level:</td>
                <td>$r5</td>
              </tr>
              <tr>
                <td><br><br>
                  <input type='hidden' name='cname' value='$r0'>
                  <button id='edit-btn' type='submit' name='edit' value='$id'>Edit</button>
                </td>
              </tr>
            </table>
          </pre>
          </button>
          </form>
          </div>
          _END;
        }
      }
    ?>
  </fieldset>
  <script type='text/javascript' defer>
    const level = document.querySelectorAll("#level");
    const displayLevel = document.querySelectorAll("#value");
    for(let i= 0; i < level.length; i++) {
      displayLevel[i].textContent = level[i].value;
      level[i].addEventListener("input", (event) => {
        displayLevel[i].textContent = event.target.value;
      });
    }
  </script>
</body>
</html>
<?php session_unset(); session_destroy(); ?>