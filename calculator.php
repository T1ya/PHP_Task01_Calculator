<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='style.css' />
    <title>Result</title>
</head>
<body>
    <section class="result">
    <?php
        require_once "functions.php";

        if ($_POST) {
            $a      = $_POST["firstNum"] ?? null;
            $b      = $_POST["secondNum"] ?? null;
            $action = $_POST["action"] ?? null;

            $status = validate($a, $b, $action);
            $result = match ($status) {
                Status::OK => calculate(a: $a, b: $b, action: $action),
                Status::EMPTY_E => "Error - empty values",
                Status::NUM_E => "Error - please enter two numbers",
                Status::ACTION_E => "Error - wrong action",
                Status::ZERO_E => "Error - division by 0",
            };
            $class = ($status == Status::OK ? 'success' : 'error');
            echo "<p>" . htmlspecialchars("$a $action $b") . " =</p>";
            echo "<h1 class=$class>" . htmlspecialchars($result) . "</h1>";
            $_SESSION['history'][] = "<span class=$class>$a $action $b = $result<span>";
        }
    ?>
    </section>
    <form action = "index.php">
    <section class="result log">
        <ul>
        <?php
            if (! empty($_SESSION['history'])) {
                foreach ($_SESSION['history'] as $key => $value) {
                    echo "<li>$key) $value</li>";
                }
            }
        ?>
        </ul>
        <button type="submit">Back</button>
        </section>
        </form>
</body>
</html>
