<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form method="post" action="calculator.php">
      <section>
        <label for="firstNum">First number:</label>
        <input type="number" name="firstNum" id="firstNum" value="50" required/>
      </section>
      <section>
        <label for="secondNum">Second number:</label>
        <input type="number" name="secondNum" id="secondNum" value="7" required/>
      </section>
      <section>
        <?php include_once "constants.php"?>
        <label for="action">Action:</label>
        <select name="action">
          <option value=<?php echo Actions::Add->value?> selected><?php echo Actions::Add->value?></option>
          <option value=<?php echo Actions::Sub->value?> ><?php echo Actions::Sub->value?></option>
          <option value=<?php echo Actions::Mult->value?> ><?php echo Actions::Mult->value?></option>
          <option value=<?php echo Actions::Div->value?> ><?php echo Actions::Div->value?></option>
          <option value=<?php echo Actions::Rest->value?> ><?php echo Actions::Rest->value?></option>
          <option value="false">false</option>
        </select>
      </section>
      <button type="submit"> = </button>
    </form>
  </body>
</html>
