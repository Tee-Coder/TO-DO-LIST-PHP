<?php
  session_start();
  
  if ( !isset( $_SESSION['todotask'] ) )
  {
    $_SESSION['todotask'] = array();
  }
  
  $_SESSION['todotask'] = array_values( $_SESSION['todotask'] );
  
  if ( isset( $_POST ) && !empty( $_POST ) )
  {
    array_push($_SESSION['todotask'], $_POST['todoitem']);
  }

?><!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List</title>
  </head>
  <body>
    <header>
      <h1>Add a To-Do</h1>
      <form action="./index.php" method="POST">
        <label for="todoitem">
          Enter a new task:
          <input type="text" name="todoitem" id="todoitem">
        </label>
        <input type="submit" value="Add to List" id="add">
         <input type="submit" value="Reset" id="reset">

      <?php if ( !empty( $_SESSION['todotask'] ) ) : ?>
        <h2>Active To-Dos:</h2>
        <ul>
          <?php foreach ( $_SESSION['todotask'] as $T ) : ?>
            <li>
              <input type="checkbox" name="<?php echo $T; ?>" id="<?php echo $T; ?>">

              <label for="<?php echo $T; ?>">
              <?php echo $T; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      </form>
      <pre>
        <strong>$_POST contents:</strong>
        <?php var_dump( $_POST ); ?>
      </pre>
      <pre>
        <strong>$_SESSION contents:</strong>
        <?php var_dump( $_SESSION ); ?>
      </pre>
    </header>
  </body>
</html>