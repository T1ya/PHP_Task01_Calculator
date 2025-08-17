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
            $a      = $_POST["firstNum"];
            $b      = $_POST["secondNum"];
            $action = $_POST["action"];

            $status = validate($a, $b, $action);
            $result = match ($status) {
                Status::OK => calculate(a: $a, b: $b, action: $action),
                Status::EMPTY_E => "Error - empty values",
                Status::NUM_E => "Error - please enter two numbers",
                Status::ACTION_E => "Error - wrong action",
                Status::ZERO_E => "Error - division by 0",
            };
            echo "<p>" . htmlspecialchars("$a $action $b") . " =</p>";
            echo "<p class=" . ($status == Status::OK ? 'success' : 'error') . ">" . htmlspecialchars($result) . "</p>";
        }
    ?>
    </section>
</body>
</html>
