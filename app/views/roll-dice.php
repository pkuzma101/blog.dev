<!DOCTYPE html>
<html lang="en">
<head>
    <title>Want to Play a Game?</title>
</head>
<body>
    <h1><?php echo "The Dice say " . $roll; ?></h1>
    <h1><?php echo "Your guess was " . $guess; ?></h1>
    <h2>
    	<?php if($roll == $guess): ?>
    		<p>You win!</p>
    	<?php endif ?>
    	<?php if($roll != $guess): ?>
    		<p>You lose!</p>
    	<?php endif ?>
    </h2> 
    
</body>
</html>