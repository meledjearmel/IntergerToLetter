<?php
class NumberToLetters {

    private int $lenght;

    public function writeToLetter($number)
    {
        $this->lenght = strlen($number);

        if ($this->lenght === 1) {

            return $this->unit($number);

        } elseif ($this->lenght === 2) {

            $number = strval($number);

            $unit = (int) $number[1];
            $tenth = (int) ($number[0] . "0");

            if ($this->special($number)) {

                $lettre = $this->special($number);

            } else {

                $lettre = $this->tenth($tenth);
                if ($unit !== 0) {
                    $lettre .= " " . $this->unit($unit);
                }

            }

            return $lettre;

        } elseif ($this->lenght === 3) {

            $base = "cent";

            $number = strval($number);

            $unit = (int) $number[2];
            $tenth = (int) ($number[1] . "0");
            $tenthSum = $tenth + $unit;
            $century = (int) ($number[0]);



            $lettre = ($century === 1) ? $base : $this->unit($century) . " " . $base;

            if ($tenthSum !== 0 && $unit !== 0) {
                if ($this->special($tenthSum)) {

                    $lettre .= " " . $this->special($tenthSum);

                } else {

                    $lettre .= " " .  $this->tenth($tenth);
                    if ($unit !== 0) {
                        $lettre .= " " . $this->unit($unit);
                    }

                }
            } elseif ($tenthSum === 0 && $unit !== 0) {
                $lettre .= " " . $this->unit($unit);
            }

            return $lettre;

        }
    }

    private function unit(int $unit)
    {
        switch ($unit) {
        case 0:
            return "zero";
            break;
        case 1:
            return "un";
            break;
        case 2:
            return "deux";
        case 3:
            return "trois";
            break;
        case 4:
            return "quatre";
        case 5:
            return "cinq";
            break;
        case 6:
            return "six";
            break;
        case 7:
            return "sept";
        case 8:
            return "huit";
            break;
        case 9:
            return "neuf";
            break;
        }
    }

    public function tenth(int $tenth)
    {
        switch ($tenth) {
        case 10:
            return "dix";
            break;
        case 20:
            return "vingt";
        case 30:
            return "trente";
            break;
        case 40:
            return "quarante";
        case 50:
            return "cinquante";
            break;
        case 60:
            return "soixante";
            break;
        case 70:
            return "soixante-dix";
        case 80:
            return "quatre-vingt";
            break;
        case 90:
            return "quatre-vingt-dix";
            break;
        }

    }

    private function special(int $special_number)
    {
        switch ($special_number) {
            case 11:
                return "onze";
                break;
            case 12:
                return "douze";
                break;
            case 13:
                return "treize";
                break;
            case 14:
                return "quartorze";
                break;
            case 15:
                return "quinze";
                break;
            case 16:
                return "seize";
                break;
            case 71:
                return "soixante onze";
                break;
            case 72:
                return "soixante douze";
                break;
            case 73:
                return "soixante treize";
                break;
            case 74:
                return "soixante quartorze";
                break;
            case 75:
                return "soixante onze";
                break;
            case 76:
                return "soixante douze";
                break;
            case 91:
                return "quatre-vingt onze";
                break;
            case 92:
                return "quatre-vingt douze";
                break;
            case 93:
                return "quatre-vingt treize";
                break;
            case 94:
                return "quatre-vingt quartorze";
                break;
            case 95:
                return "quatre-vingt onze";
                break;
            case 96:
                return "quatre-vingt douze";
                break;
        }

        return false;
    }
}