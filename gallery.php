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
  function editCharacter($id, $nm, $bg, $a, $rc, $cl, $lvl, $xpp, $ar, $isp, $str, $dex, $ctn, $int, $wis, $chm, $chp, $thp, $hdc, $scc, $fal, $anm1, $anm2, $anm3, $abn1, $abn2, $abn3, $dtp1, $dtp2, $dtp3, $exs, $cp, $sp, $ep, $gp, $pp, $eqp, $opl, $pst, $idl, $bnd, $flw, $fet) {
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
            <td><input type='text' name='background' placeholder=$bg value=$bg></td>
            <td>Alignment:</td>
    _END;
    // Alignment update selector
    echo "<td><select name='alignment' value='$a'>
      <option ";
    if($a === "Lawful Good") echo "selected='selected'";
    echo "value='Lawful Good'>Lawful Good</option>";
    echo "<option ";
    if($a === "Neutral Good") echo "selected='selected'";
    echo "value='Neutral Good'>Neutral Good</option>";
    echo "<option ";
    if($a === "Chaotic Good") echo "selected='selected'";
    echo "value='Chaotic Good'>Chaotic Good</option>";
    if($a === "Lawful Neutral") echo "selected='selected'";
    echo "value='Lawful Neutral'>Lawful Neutral</option>";
    echo "<option ";
    if($a === "Neutral Neutral") echo "selected='selected'";
    echo "value='Neutral Neutral'>Neutral Neutral</option>";
    echo "<option ";
    if($a === "Chaotic Neutral") echo "selected='selected'";
    echo "value='Chaotic Neutral'>Chaotic Neutral</option>";
    if($a === "Lawful Evil") echo "selected='selected'";
    echo "value='Lawful Evil'>Lawful Evil</option>";
    echo "<option ";
    if($a === "Neutral Evil") echo "selected='selected'";
    echo "value='Neutral Evil'>Neutral Evil</option>";
    echo "<option ";
    if($a === "Chaotic Evil") echo "selected='selected'";
    echo "value='Chaotic Evil'>Chaotic Evil</option></select></td>";

    // Race update selector
    echo "<td>Race:</td>
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
            <td>Level:</td>
            <td><input type="range" id="level" name="level" min="1" max="10" value='$lvl'> <output id="value"></output></td>
            <td>XP points:</td>
            <td><input type="number" name="xp-points" value='$xpp'/></td>
          </tr>
          <tr>
            <td>Armor:</td>
    _END;
    echo '<td><select name="armor-type"><option ';
    if ($ar == "padded") {echo "selected='selected'";}
    echo ' value="padded">Padded</option><option ';
    if ($ar == "leather") {echo "selected='selected'";}
    echo ' value="leather">Leather</option><option ';
    if ($ar == "studded") {echo "selected='selected'";}
    echo ' value="studded">Studded Leather</option><option ';
    if ($ar == "hide") {echo "selected='selected'";}
    echo ' value="hide">Hide</option><option ';
    if ($ar == "chain-shirt") {echo "selected='selected'";}
    echo ' value="chain-shirt">Chain Shirt</option><option ';
    if ($ar == "scale") {echo "selected='selected'";}
    echo ' value="scale">Scale Mail</option><option ';
    if ($ar == "breast") {echo "selected='selected'";}
    echo ' value="breast">Breastplate</option><option ';
    if ($ar == "half") {echo "selected='selected'";}
    echo ' value="half">Half Plate</option><option ';
    if ($ar == "ring") {echo "selected='selected'";}
    echo ' value="ring">Ring Mail</option><option ';
    if ($ar == "chain-mail") {echo "selected='selected'";}
    echo ' value="chain-mail">Chain Mail</option><option ';
    if ($ar == "splint") {echo "selected='selected'";}
    echo ' value="splint">Splint</option><option ';
    if ($ar == "plate") {echo "selected='selected'";}
    echo ' value="plate">Plate</option></select></td>';
    echo <<<_END
            <td>Inspiration:</td>
            <td><input type="checkbox" name="inspiration" value='$isp'/></td>
          </tr>
          <tr>
            <td>Strength:</td>
            <td><input type="number" name="strength" value='$str'/></td>
            <td>Dexterity:</td>
            <td><input type="number" name="dexterity" value='$dex'/></td>
          </tr>
          <tr>
            <td>Constitution:</td>
            <td><input type="number" name="constitution" value='$ctn'/></td>
            <td>Intelligence:</td>
            <td><input type="number" name="intelligence" value='$int'/></td>
          </tr>
          <tr>
            <td>Widsom:</td>
            <td><input type="number" name="wisdom" value='$wis'/></td>
            <td>Charisma:</td>
            <td><input type="number" name="charisma" value='$chm'/></td>
          </tr>
          <tr>
            <td>Current HP:</td>
            <td><input type="number" name="current-hp" value='$chp'/></td>
            <td>Temporary HP:</td>
            <td><input type="number" name="temp-hp" value='$thp'/></td>
          </tr>
          <tr>
            <td>Hit Dice:</td>
            <td><input type="number" name="hit-dice" value='$hdc'/></td>
            <td>Death Saves:</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>Successes:</td>
            <td><input type="range" id="level" name="save-success" min="0" max="3" value='$scc'/> <output id="value"></output></td>
            <td>Failures:</td>
            <td><input type="range" id="level" name="save-fail" min="0" max="3" value='$fal'/> <output id="value"></output></td>
          </tr>
          <tr>
            <td></td>
            <td>Attack Spells:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Name</td>
            <td></td>
            <td>ATK Bonus</td>
            <td></td>
            <td>Damage Type</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="text" name="aname1" value="$anm1" placeholder="$anm1"></td>
            <td></td>
            <td><input type="number" name="atk-bonus1" value='$abn1'></td>
            <td></td>
            <td><input type="text" name="dmg-type1" value='$dtp1'></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="text" name="aname2" value="$anm2" placeholder="$anm2"></td>
            <td></td>
            <td><input type="number" name="atk-bonus2" value='$abn2'></td>
            <td></td>
            <td><input type="text" name="dmg-type2" value='$dtp2'></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="text" name="aname3" value="$anm3" placeholder="$anm3"></td>
            <td></td>
            <td><input type="number" name="atk-bonus3" value='$abn3'></td>
            <td></td>
            <td><input type="text" name="dmg-type3" value='$dtp3'></td>
          </tr>
          <tr>
            <td></td>
            <td>Extra Attack Spells:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="extra-atk-spells" rows="5" cols="100" style="width: 70%; height: auto;" value='$exs'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Finances:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Copper pieces:</td>
            <td><input type="number" name="cp" value='$cp'></td>
            <td>Silver pieces:</td>
            <td><input type="number" name="sp" value='$sp'></td>
            <td>Electrum Pieces:</td>
            <td><input type="number" name="ep" value='$ep'></td>
          </tr>
          <tr>
            <td>Gold Pieces:</td>
            <td><input type="number" name="gp" value='$gp'></td>
            <td>Platinum Pieces:</td>
            <td><input type="number" name="pp" value='$pp'></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Equipment:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="equipment" rows="5" cols="100" style="width: 90%; height: auto;" value='$eqp'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Other Proficieincies and Languages:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="proficiencies" rows="5" cols="100" style="width: 90%; height: auto;" value='$opl'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Personality Traits:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="personality-traits" rows="5" cols="100" style="width: 90%; height: auto;" value='$pst'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Ideals:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="ideals" rows="5" cols="100" style="width: 90%; height: auto;" value='$idl'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Bonds:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="bonds" rows="5" cols="100" style="width: 90%; height: auto;" value='$bnd'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Flaws:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="flaws" rows="5" cols="100" style="width: 90%; height: auto;" value='$flw'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Features and Traits:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><textarea name="features-traits" rows="5" cols="100" style="width: 90%; height: auto;" value='$fet'></textarea></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
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
        $id           = $pdo->quote($_POST['edit-id']);
        $user_id      = $pdo->quote($_SESSION['user_id']);
        $cname        = $pdo->quote($_POST['cname']);
        $background   = $pdo->quote($_POST['background']);
        $alignment    = $pdo->quote($_POST['alignment']);
        $race         = $pdo->quote($_POST['race']);
        $class        = $pdo->quote($_POST['char-class']);
        $level        = $pdo->quote($_POST['level']);
        $xpp          = $pdo->quote($_POST['xp-points']);
        $armour       = $pdo->quote($_POST['']);
        $inspiration  = $pdo->quote($_POST['']);
        $strength     = $pdo->quote($_POST['']);
        $dexterity    = $pdo->quote($_POST['']);
        $constitution = $pdo->quote($_POST['']);
        $intelligence = $pdo->quote($_POST['']);
        $wisdom       = $pdo->quote($_POST['']);
        $charisma     = $pdo->quote($_POST['']);
        $hpCurrent    = $pdo->quote($_POST['']);
        $hpTemp       = $pdo->quote($_POST['']);
        $hitDice      = $pdo->quote($_POST['']);
        $saveSuccess  = $pdo->quote($_POST['']);
        $saveFail     = $pdo->quote($_POST['']);
        $armour       = $pdo->quote($_POST['']);
        $aname        = $pdo->quote($_POST['']);
        $atkBns       = $pdo->quote($_POST['']);
        $dmgType      = $pdo->quote($_POST['']);
        $armour       = $pdo->quote($_POST['']);
        $extraAtks    = $pdo->quote($_POST['']);
        $copper       = $pdo->quote($_POST['']);
        $silver       = $pdo->quote($_POST['']);
        $electrum     = $pdo->quote($_POST['']);
        $gold         = $pdo->quote($_POST['']);
        $platinum     = $pdo->quote($_POST['']);
        $equipment    = $pdo->quote($_POST['']);
        
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
      Name: <input type="text" name="cname" required>              Background: <input type="text" name="background" required>             Alignment: <select name="alignment"><option value="Lawful Good">Lawful Good</option><option value="Neutral Good">Neutral Good</option><option value="Chaotic Good">Chaotic Good</option><option value="Lawful Neutral">Lawful Neutral</option><option value="Neutral Neutral">Neutral Neutral</option><option value="Chaotic Neutral">Chaotic Neutral</option><option value="Lawful Evil">Lawful Evil</option><option value="Neutral Evil">Neutral Evil</option><option value="Chaotic Evil">Chaotic Evil</option></select>

      Race: <input type="radio" name="race" value="human" required>Human   <input type="radio" name="race" value="dwarf">Dwarf    <input type="radio" name="race" value="druid">Druid           Class:  <input type="radio" name="char-class" value="fighter" required>Fighter    <input type="radio" name="char-class" value="rogue">Rogue              Level: <input type="range" id="level" name="level" min="1" max="20"/> <output id="value"></output>
            <input type="radio" name="race" value="elf">Elf     <input type="radio" name="race" value="orc">Orc      <input type="radio" name="race" value="gnome">Gnome                   <input type="radio" name="char-class" value="assassin">Assassin   <input type="radio" name="char-class" value="merchant">Merchant
            <input type="radio" name="race" value="fairy">Fairy   <input type="radio" name="race" value="hobbit">Hobbit   <input type="radio" name="race" value="undead">Undead                  <input type="radio" name="char-class" value="ranger">Ranger     <input type="radio" name="char-class" value="barbarian">Barbarian
                                                           <input type="radio" name="char-class" value="cleric">Cleric     <input type="radio" name="char-class" value="mage">Mage

         XP Points: <input type="number" name="xp-points">                         Armor:  <select name="armor-type"><option value="padded">Padded</option><option value="leather">Leather</option><option value="studded">Studded Leather</option>           
                                                                                      <option value="hide">Hide</option><option value="chain-shirt">Chain Shirt</option><option value="scale">Scale Mail</option><option value="breast">Breastplate</option>
                                                                                      <option value="half">Half Plate</option><option value="ring">Ring Mail</option><option value="chain-mail">Chain Mail</option>
                                                                                      <option value="splint">Splint</option><option value="plate">Plate</option>
                                                                                      </select>                    Inspiration: <input type="checkbox" name="inspiration">

          Strength: <input type="number" name="strength">                     Dexterity: <input type="number" name="dexterity"> 

      Constitution: <input type="number" name="constitution">                  Intelligence: <input type="number" name="intelligence">

            Wisdom: <input type="number" name="wisdom">                      Charisma: <input type="number" name="charisma">

        Current HP: <input type="number" name="current-hp">                  Temporary HP: <input type="number" name="temp-hp">

          Hit Dice: <input type="number" name="hit-dice">

       Death Saves:        Successes: <input type="range" id="level" name="save-success" min="0" max="3"/> <output id="value"></output>                       Failures: <input type="range" id="level" name="save-fail" min="0" max="3"/> <output id="value"></output>

      Attacks & Spells:
                  Name                                  ATK Bonus                        Damage Type
          <input type="text" name="aname1">                    <input type="number" name="atk-bonus1">                <input type="text" name="dmg-type1">
          <input type="text" name="aname2">                    <input type="number" name="atk-bonus2">                <input type="text" name="dmg-type2">
          <input type="text" name="aname3">                    <input type="number" name="atk-bonus3">                <input type="text" name="dmg-type3">
      
      Extra Spells:
                     <textarea name="extra-atk-spells" rows="5" cols="100" style="width: 70%; height: auto;"></textarea>

      Finances:

              Copper Pieces: <input type="number" name="cp">            Silver Pieces: <input type="number" name="sp">            Electrum Pieces: <input type="number" name="ep">

                Gold Pieces: <input type="number" name="gp">          Platinum Pieces: <input type="number" name="pp">
    
      Equipment:
            
            <textarea name="equipment" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

      Other Proficiencies and Languages:

            <textarea name="proficiencies" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

      Personality Traits:

            <textarea name="personality-traits" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

      Ideals:

            <textarea name="ideals" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

      Bonds:

            <textarea name="bonds" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

      Flaws:

            <textarea name="flaws" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

      Features & Traits:

            <textarea name="features-traits" rows="5" cols="100" style="width: 90%; height: auto;"></textarea>

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
        $id  = htmlspecialchars($row['cid']);
        $ud  = htmlspecialchars($row['uid']);
        $gd  = htmlspecialchars($row['gid']);
        $r0  = htmlspecialchars($row['cname']);
        $r1  = htmlspecialchars($row['background']);
        $r2  = htmlspecialchars($row['alignment']);
        $r3  = htmlspecialchars($row['race']);
        $r4  = htmlspecialchars($row['class']);
        $r5  = htmlspecialchars($row['level']);
        $r6  = htmlspecialchars($row['xp_points']);
        $r7  = htmlspecialchars($row['armor']);
        $r8  = htmlspecialchars($row['inspiration']);
        $r9  = htmlspecialchars($row['strength']);
        $r10 = htmlspecialchars($row['dexterity']);
        $r11 = htmlspecialchars($row['constitution']);
        $r12 = htmlspecialchars($row['intelligence']);
        $r13 = htmlspecialchars($row['wisdom']);
        $r14 = htmlspecialchars($row['charisma']);
        $r15 = htmlspecialchars($row['current_hp']);
        $r16 = htmlspecialchars($row['temp_hp']);
        $r17 = htmlspecialchars($row['hit_dice']);
        $r18 = htmlspecialchars($row['death_save_success']);
        $r19 = htmlspecialchars($row['death_save_fail']);
        $r20 = htmlspecialchars($row['atk_name1']);
        $r21 = htmlspecialchars($row['atk_bonus1']);
        $r22 = htmlspecialchars($row['dmg_type1']);
        $r23 = htmlspecialchars($row['atk_name2']);
        $r24 = htmlspecialchars($row['atk_bonus2']);
        $r25 = htmlspecialchars($row['dmg_type1']);
        $r26 = htmlspecialchars($row['atk_name3']);
        $r27 = htmlspecialchars($row['atk_bonus3']);
        $r28 = htmlspecialchars($row['dmg_type3']);
        $r29 = htmlspecialchars($row['extra_atk_spells']);
        $r30 = htmlspecialchars($row['cp']);
        $r31 = htmlspecialchars($row['sp']);
        $r32 = htmlspecialchars($row['ep']);
        $r33 = htmlspecialchars($row['gp']);
        $r34 = htmlspecialchars($row['pp']);
        $r35 = htmlspecialchars($row['equipment']);
        $r36 = htmlspecialchars($row['prof_lang']);
        $r37 = htmlspecialchars($row['p_traits']);
        $r38 = htmlspecialchars($row['ideals']);
        $r39 = htmlspecialchars($row['bonds']);
        $r40 = htmlspecialchars($row['flaws']);
        $r41 = htmlspecialchars($row['f_traits']);

        if((isset($_SESSION['edit']) && isset($_POST['edit'])) && ($_SESSION['edit'] && $_POST['edit'] === $id)) { 
          editCharacter($id, $r0, $r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12, $r13, $r14, $r15, $r16, $r17, $r18, $r19, $r20, $r21, $r22, $r23, $r24, $r25, $r26, $r27, $r28, $r29, $r30, $r31, $r32, $r33, $r34, $r35, $r36, $r37, $r38, $r39, $r40, $r41);
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
                <td>Alignment:</td>
                <td>$r2</td>
                <td>Race:</td>
                <td>$r3</td>
              </tr>
              <tr>
                <td>Class:</td>
                <td>$r4</td>
                <td>Level:</td>
                <td>$r5</td>
                <td>XP Points:</td>
                <td>$r6</td>
              </tr>
              <tr>
                <td>Armor:</td>
                <td>$r7</td>
                <td>Inspiration:</td>
                <td>$r8</td>
              </tr>
              <tr>
                <td>Strength:</td>
                <td>$r9</td>
                <td>Dexterity:</td>
                <td>$r10</td>
              </tr>
              <tr>
                <td>Constitution:</td>
                <td>$r11</td>
                <td>Intelligence:</td>
                <td>$r12</td>
              </tr>
              <tr>
                <td>Wisdom:</td>
                <td>$r13</td>
                <td>Charisma:</td>
                <td>$r14</td>
              </tr>
              <tr>
                <td>Current HP:</td>
                <td>$r15</td>
                <td>Temporary HP:</td>
                <td>$r16</td>
              </tr>
              <tr>
                <td>Hit Dice:</td>
                <td>$r17</td>
                <td>Death Saves:</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>Successes:</td>
                <td>$r18</td>
                <td>Failures:</td>
                <td>$r19</td>
              </tr>
              <tr>
                <td></td>
                <td>Attack Spells:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Name:</td>
                <td>$r20</td>
                <td>ATK Bonus:</td>
                <td>$r21</td>
                <td>Damage Type:</td>
                <td>$r22</td>
              </tr>
              <tr>
                <td></td>
                <td>Extra Attack Spells:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r23</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Finances:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Copper pieces:</td>
                <td>$r24</td>
                <td>Silver pieces:</td>
                <td>$r25</td>
                <td>Electrum Pieces:</td>
                <td>$r26</td>
              </tr>
              <tr>
                <td>Gold Pieces:</td>
                <td>$r27</td>
                <td>Platinum Pieces:</td>
                <td>$r28</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Equipment:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r29</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Other Proficieincies and Languages:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Personality Traits:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r31</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Ideals:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r32</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Bonds:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r33</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Flaws:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r34</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Features and Traits:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>$r35</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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