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
    header('Location: index.php');
    exit;
  }
  if(isset($_POST['change-game']) && $_POST['change-game']) {
    header('Location: index.php');
    exit;
  }
  # Testing lab computer can change repo
  function editCharacter($id, $nm, $a, $g, $rc, $cl, $lvl) {
    echo <<<_END
      <div class="homes">
      <form action='gallery.php' method='post'>
      <pre>
        <table>
          <tr>
            <td>Name:</td>
            <td><input type='text' name='cname' placeholder=$nm value=$nm></td>
          </tr>
          <tr>
            <td>Background:</td>
            <td><input type='text' name='background' placeholder=$a value=$a></td>
          </tr>
          <tr>
            <td>Alignment:</td>
    _END;
    // Alignment update selector
    echo "<td><select name='alignment' value='$g'>
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
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Basic RPG - Character Sheet Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" type="text/css"/>
</head>
<body>
  <section class="border">
    <div class="searchbar">
      <form action="gallery.php" method="POST" class="search-form">
        <input type="submit" value="Search">
        <input type="text" id="search" name="search" required>
      </form>
    </div>
    <div class="navbar">
      <form action="gallery.php" method="post">
        <button type="submit" name="logout" value="true">Logout</button>
        <button type="submit" name="change-game" value="true">Change RPG Game</button>
        <button type="submit" name="create-sheet" value="true">Create RPG Sheet</button>
        <button type="submit" name="gallery" value="true">Your Sheet Gallery</button>
      </form>
    </div>
  </section>
  <div class="hero-section">
    <h1 class="hero-title" style="text-align: center;">RPG Character Sheet Management System</h1>
    <h2 class="hero-subtitle" style="text-align: center;"><?php echo $_SESSION['username']."'s Character Sheet Gallery";?></h2>
  </div>
  <?php
    if (isset($_POST['delete']) && isset($_POST['cname'])) {
      $username = $_SESSION['username'];
      $cname  = $pdo->quote($_POST['cname']);
      $query  = "DELETE char_sheets FROM char_sheets JOIN users ON char_sheets.uid=users.id JOIN games ON char_sheets.gid = games.id WHERE cname=$cname";
      $result = $pdo->query($query);
      echo "<h4 style='text-align: center;'>Character ".$cname." removed from ".$username."'s Gallery.</h4>";
    }
    elseif(isset($_POST['edit'])) {
      $_SESSION['edit'] = true;
    }
    elseif(isset($_POST['update'])) {
      $user_id = $_SESSION['user_id'];
      $username = $_SESSION['username'];
      session_unset();
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $user_id;
      if (isset($_POST['cname']) &&
        isset($_POST['background']) &&
        isset($_POST['alignment']) &&
        isset($_POST['race']) &&
        isset($_POST['char-class']) && 
        isset($_POST['level']) &&
        isset($_POST['edit-id'])) {
        $cname    = $pdo->quote($_POST['cname']);
        $background      = $pdo->quote($_POST['background']);
        $user_id  = $pdo->quote($_SESSION['user_id']);
        $alignment   = $pdo->quote($_POST['alignment']);
        $race     = $pdo->quote($_POST['race']);
        $class    = $pdo->quote($_POST['char-class']);
        $level    = $pdo->quote($_POST['level']);
        $id       = $pdo->quote($_POST['edit-id']);
        
        $query    = "UPDATE char_sheets JOIN users ON char_sheets.uid = users.id JOIN games ON char_sheets.gid = games.id
                      SET cname=$cname, background=$background, alignment=$alignment, race=$race, class=$class, level=$level WHERE cid=$id AND uid=$user_id";
        $result = $pdo->query($query);
        echo "<h4>Character ".$cname." updated in ".$username."'s Gallery.</h4>";
      }
    }
    elseif (!isset($_POST['update']) && 
        isset($_POST['cname'])   &&
        isset($_POST['background']) &&
        isset($_POST['alignment']) &&
        isset($_POST['race']) &&
        isset($_POST['char-class']) && 
        isset($_POST['level'])) {
      $username = $_SESSION['username'];
      $cname    = $pdo->quote($_POST['cname']);
      $user_id  = $pdo->quote($_SESSION['user_id']);
      $game_id  = $pdo->quote($_SESSION['game_id']);
      $background      = $pdo->quote($_POST['background']);
      $alignment   = $pdo->quote($_POST['alignment']);
      $race     = $pdo->quote($_POST['race']);
      $class    = $pdo->quote($_POST['char-class']);
      $level    = $pdo->quote($_POST['level']);

      $pdf_data = [
        'ClassLevel' => $_POST['char-class'].' - '.$_POST['level'],
        'PlayerName' => $usename,
        'CharacterName' => $_POST['cname'],
        'Race' => $_POST['race']
      ];
      
      $query    = "INSERT INTO char_sheets (cname, uid, gid, background, alignment, race, class, level) VALUES ($cname, $user_id, $game_id, $background, $alignment, $race, $class, $level)";
      $result = $pdo->query($query);
      echo "<h4>Character ".$cname." added to ".$username."'s Gallery.</h4>";
    }
    if ((isset($_POST['create-sheet']) && $_POST['create-sheet']) || (!isset($_POST['create-sheet']) && !isset($_POST['gallery']))) {
      echo <<<_END
            <div class="container">
              <form action="gallery.php" method="post" autocomplete="off">
                <fieldset id="add">
                  <legend>New Character Sheet</legend>
                  <pre>
             Name: <input type="text" name="cname" required>

       Background: <input type="text" name="background" required>

        Alignment: <input type="radio" name="alignment" value="male" required>Male   <input type="radio" name="alignment" value="female">Female   <input type="radio" name="alignment" value="other">Other

             Race: <input type="radio" name="race" value="human" required>Human   <input type="radio" name="race" value="dwarf">Dwarf    <input type="radio" name="race" value="druid">Druid
                   <input type="radio" name="race" value="elf">Elf     <input type="radio" name="race" value="orc">Orc      <input type="radio" name="race" value="gnome">Gnome
                   <input type="radio" name="race" value="fairy">Fairy   <input type="radio" name="race" value="hobbit">Hobbit   <input type="radio" name="race" value="undead">Undead

            Class:  <input type="radio" name="char-class" value="fighter" required>Fighter    <input type="radio" name="char-class" value="rogue">Rogue
                    <input type="radio" name="char-class" value="assassin">Assassin   <input type="radio" name="char-class" value="merchant">Merchant
                    <input type="radio" name="char-class" value="ranger">Ranger     <input type="radio" name="char-class" value="barbarian">Barbarian
                    <input type="radio" name="char-class" value="cleric">Cleric     <input type="radio" name="char-class" value="mage">Mage

             Level: <input type="range" id="level" name="level" min="1" max="10"/> <output id="value"></output>

         XP Points: <input type="number" name="xp-points">      Inspiration: <input type="checkbox" name="inpiration">

          Strength: <input type="number" name="strength">            Dexterity: <input type="number" name="dexterity"> 

      Constitution: <input type="number" name="constitution">     Intelligence: <input type="number" name="intelligence">

            Wisdom: <input type="number" name="wisdom">               Charisma: <input type="number" name="charisma">

             Armor: <select name="armor-type"><option value="padded">Padded</option><option value="leather">Leather</option><option value="studded">Studded Leather</option>
            <option value="hide">Hide</option><option value="chain-shirt">Chain Shirt</option><option value="scale">Scale Mail</option><option value="breast">Breastplate</option>
            <option value="half">Half Plate</option><option value="ring">Ring Mail</option><option value="chain-mail">Chain Mail</option>
            <option value="splint">Splint</option><option value="plate">Plate</option>
                  </select>

        Current HP: <input type="number" name="current-hp">     Temporary HP: <input type="number" name="temp-hp">

          Hit Dice: <input type="number" name="hit-dice">

       Death Saves:

        Successes: <input type="range" id="level" name="save-success" min="0" max="3"/> <output id="value"></output>

        Failures: <input type="range" id="level" name="save-failures" min="0" max="3"/> <output id="value"></output>

      Attacks & Spells:

        Name: <input type="text" name="aname">    ATK Bonus: <input type="number" name="atk-bonus">     Damage/Type: <input type="text" name="damage-type">

          <textarea name="extra-atk-spells">
          
          
          </textarea>

      Finances:

        Copper Pieces: <input type="number" name="cp">    Silver Pieces: <input type="number" name="sp">    Electrum Pieces: <input type="number" name="ep">

                Gold Pieces: <input type="number" name="cp">        Platinum Pieces: <input type="number" name="sp">
    
      Equipment:
            
        <textarea name="equipment">
        
        
        
        </textarea>

      Other Proficiencies and Languages:

        <textarea name="proficiencies">



        </textarea>

      Personality Traits:

        <textarea name="personality-traits">



        </textarea>

      Ideals:

        <textarea name="ideals">



        </textarea>

      Bonds:

        <textarea name="bonds">



        </textarea>

      Flaws:

        <textarea name="flaws">



        </textarea>

      Features & Traits:

        <textarea name="features-traits">







        </textarea>

                  <button id="new-btn" type="submit" value="Character Sheet Created">Create Character Sheet</button>
                  </pre>
                </fieldset>
              </form>
            </div>
      _END;
    }
    if ((isset($_POST['gallery']) && $_POST['gallery']) || (!isset($_POST['create-sheet']) && !isset($_POST['gallery']))) {
      echo '<fieldset id="roster">
        <legend>Character Roster</legend>';
      $user_id = $_SESSION['user_id'];
      if(isset($_POST['search']) && !empty($_POST['search'])) {
        $search = $pdo->quote("%".$_POST['search']."%");
        $query  = "SELECT * FROM char_sheets JOIN users ON char_sheets.uid = users.id JOIN games ON char_sheets.gid = games.id WHERE cname like $search AND uid=$user_id";
        $result = $pdo->query($query);

      } else {
        $query  = "SELECT * FROM char_sheets JOIN users ON char_sheets.uid = users.id JOIN games ON char_sheets.gid = games.id WHERE uid=$user_id";
        $result = $pdo->query($query);
      }
      while ($row = $result->fetch()) {
        $id = htmlspecialchars($row['cid']);
        $ud = htmlspecialchars($row['uid']);
        $gd = htmlspecialchars($row['gid']);
        $r0 = htmlspecialchars($row['cname']);
        $r1 = htmlspecialchars($row['background']);
        $r2 = htmlspecialchars($row['alignment']);
        $r3 = htmlspecialchars($row['race']);
        $r4 = htmlspecialchars($row['class']);
        $r5 = htmlspecialchars($row['level']);
        if((isset($_SESSION['edit']) && isset($_POST['edit'])) && ($_SESSION['edit'] && $_POST['edit'] === $id)) { 
          editCharacter($id, $r0, $r1, $r2, $r3, $r4, $r5);
        } else {
          echo <<<_END
          <div class="homes">
          <form action='gallery.php' method='post'>
          <button id='delete-btn' type='submit' name='delete' value=$id onclick="return confirm('Are you sure you want to delete $r0?')">
            <table>
              <tr>
                <td>Name:</td>
                <td>$r0</td>
              </tr>
              <tr>
                <td>Background:</td>
                <td>$r1</td>
              </tr>
              <tr>
                <td>Alignment:</td>
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
            </table>
          </button>
          <button id='edit-btn' type='submit' name='edit' value='$id'">
            <table>
              <tr>
                <td>
            Edit<input type='hidden' name='cname' value='$r0'>
                </td>
              </tr>
            </table>
          </button>
          </form>
          </div>
          _END;
        }
      }
    }
  ?>
  </fieldset>
  <script type='text/javascript' defer>
    const levels = document.querySelectorAll("#level");
    const displayLevel = document.querySelectorAll("#value");
    levels.forEach((level, idx) => {
      displayLevel[idx].textContent = level.value;
      level.addEventListener("input", (newLevel) => {
        displayLevel[idx].textContent = newLevel.target.value;
      });
    });
  </script>
</body>
</html>
<?php // session_unset(); session_destroy(); ?>