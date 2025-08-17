<?php
require_once "constants.php";

function validate($a, $b, $action)
{
    if(!isset($a) || !isset($b) || !isset($action)) {
        return Status::EMPTY_E;
    }
    elseif (! is_numeric($a) || ! is_numeric($b)) {
        return Status::NUM_E;
    }
    foreach (Actions::cases() as $case) {
        if ($case->value == $action) {
            if ($case->value == "/" && $b == 0) {
                return Status::ZERO_E;
            }
            return Status::OK;
        }
    }
    return Status::ACTION_E;
}

function calculate($a, $b, $action)
{
    return match ($action) {
        Actions::Add->value => $a + $b,
        Actions::Sub->value => $a - $b,
        Actions::Mult->value => $a * $b,
        Actions::Div->value => $a / $b,
        Actions::Rest->value => $a % $b,
    };
}
