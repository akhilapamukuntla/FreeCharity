<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=freecharity', 'root', '');
$stmt = $pdo->prepare("SELECT * FROM questions where category =:category");
$category='english';
$stmt->bindValue(':category', $category);
$stmt->execute();
$arrValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($arrValues);

// open the table

// add the table headers
/*
foreach ($arrValues[0] as $key => $useless){
    print "<th>$key</th>";
}
*/
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <style>
     #submit{
       float:right;
     }
      table, th, td {
        border: 1px solid black;
      }
      th{
        text-align: left;
      }
      .middle{
        text-align: center;
      }
  		h1 {
  			background-image: url(Image1.jpg);
  			color:;
  			font-size: 72px;
  			text-align: center;
  			border-bottom: 2px solid black;
  			padding-bottom: 0px;
  		}


  		p {
  			font-size: 36px;
  			text-align: center;
  		}

  	    p1{
  			font-size: 24px;
  			float: center;
  			underline:
  			border: 1px solid black;
  		}

  		h2 {
  			font-size: 36px;
  			text-align: center;
  		}

  		nav {
  			text-align: center;
  			font-size: 24px;
  			background-color:;
  			color: white;
  		}
      </style>
  </head>
  <body>
    <h1>
    <?=$category?>
    </h1>
    <form  action="grader.php" method="post">

    <table width=100%>
      <tr>
          <th>Number</th>
          <th>Question</th>
          <th>Answers</th>
      </tr>
<?php

// display data
foreach ($arrValues as $row): ?>
    <tr>
      <td><?=$row['qid']?></td>
      <td><?=$row['info']?></td>
      <?php
      $stmt = $pdo->prepare("SELECT answercho FROM answers where qid =:qid");
      $qid=$row['qid'];
      $stmt->bindValue(':qid', $qid);
      $stmt->execute();
      $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <td>
        <input type="radio" name="<?=$row['qid']?>" value="A"> <?=$answers[0]['answercho']?><br>
        <input type="radio" name="<?=$row['qid']?>" value="B"> <?=$answers[1]['answercho']?><br>
        <input type="radio" name="<?=$row['qid']?>" value="C"> <?=$answers[2]['answercho']?>
      </td>
    </tr>
<?php endforeach;?>

    </table>
    <input type="hidden" name="category" value="<?=$category?>" />
     <button type="submit" id="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>
