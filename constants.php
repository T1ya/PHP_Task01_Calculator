<?php
   enum Actions: string {
    case Add = "+";
    case Sub = "-";
    case Mult = "*";
    case Div = "/";
    case Rest = "%";
   }

   enum Status {
      case EMPTY_E;
      case NUM_E;
      case ZERO_E;
      case ACTION_E;
      case OK;
   }
?>