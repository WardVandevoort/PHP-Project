<?php 


include_once(__DIR__ . "/classes/userProfile.php");

try{
    function calcMatch($user, $match){
        $score = 0;
        if($user->passion == $match['passion']){
            $score += 1;
        }

        if($user->movie == $match['movie']){
            $score += 1;
        }

        return $score;

    }

    function printMatch($user, $match){
        $reason = "Deze IMD'er ";
        $i = 1;

        if($user->passion == $match->passion){
            $reason .= "houdt net zoals jij ook van ".$match->passion;
            $i++;
        }

        if(i > 1 && $user->movie == $match->$movie){
            $reason .= ", en kijkt graag ".$match->movie."films!";
        }else if($user->movie == $match->movie){
            $reason .= "kijkt net zoals jij graag naar ".$match->movie."films!";
            $i++;
        }

        return $reason;
    }

    $user = UserProfile::getCurrentUser($_SESSION['user']);
    $currentPassion = UserProfile::getCurrentPassion($user['passion']);

    //Get matching profiles
    $allMatch = UserProfile::getMatch();

    $matchScores = array();

    //For each profile calculate the matchScore
    foreach($allMatch as $match){
        $score = calcMatch($currentPassion, $match);
        $matchScores[$match['user']] = $score;
    }    

  //Sort the results from high to low score
  arsort($matchScores);

}catch(\Throwable $th){
    //throw $th;
    $error = $th->getMessage();
  }

?>

<div class="row">
  <?php 
    if(!empty($matchScores)):
        foreach($matchScores as $id => $value):
        $matchInfo = UserProfile::getUserInfo($id);
            ?>
    <div>
        <img src="img/avatars/<?php echo $matchInfo->avatar;?>" alt="avatar">
        <div>
            <h5 id="matchName"><?php echo $matchInfo->firstname." ".$matchInfo->lastname;?></h5>
            <?php
                if(!empty($matchInfo->description)):
            ?>
            <blockquote class="matchDescription">
                <p><?php echo $matchInfo->description;?></p>
                <footer>
                    <cite title="Source Title">
                        <?php echo $matchInfo->location;?>
                    </cite>
                </footer>
            </blockquote>
    <?php endif; ?>
            <p class="card-text"><?php echo printReasonMatch($currentPassion, $matchInfo);?></p>
            <a href="#" class="btn btn-primary">Stuur buddy request</a>
        </div>
    </div>
            <?php 
      endforeach;
    else:
      if(!empty($error)){
        echo $error;
      }else{
        echo "No match found.";
      }
    endif;
  ?>
</div>
