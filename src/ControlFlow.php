<?php
declare(strict_types=1);

namespace Miklcct\PhpstormWarnings;

use http\Exception\RuntimeException;

class ControlFlow {
    public function foo(int $x) {
        switch ($x) {
        case 0:
            return;
            // unreachable statement
            $x;
        case 1:
            throw new RuntimeException('Should not happen');
            // unreachable statement
            $x;
        }
    }
}