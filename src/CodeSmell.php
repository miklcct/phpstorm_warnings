<?php
declare(strict_types=1);

namespace Miklcct\PhpstormWarnings;

class CodeSmell {
    // too many parameters in a constructor
    public function __construct(int $a, int $b, int $c, int $d, int $e, int $f, int $g) {
    }

    // case mismatch in class usage
    public function caseMismatch() : codesmell {
        // case mismatch in function call
        $this->DOsomething(3);
        // case mismatch in class usage
        return new codesmell(1, 2, 3, 4, 5, 6, 7);

    }

    public function doSomething(int $_) {
        if ($_ >= 300) {
            return $_;
        }
        if ($_ >= 50) {
            // inconsistent return point: missing return argument
            return;
        }
        // inconsistent return point: missing return statement
    }

    /**
     * @param int $x
     * @return void
     */
    public function returnSomething(int $x) {
        if ($x > 0) {
            return;
        }
        // 'return null' in void function
        return NULL;
    }

    public function exportArguments() : string {
        return var_export(func_get_args(), TRUE);
    }

    public function parameterNumberMismatch() : void {
        // parameter number mismatch declaration
        $this->caseMismatch(2);
        // does not warn if ignore function with last parameter $_
        $this->doSomething(1, 2, 3);
        // does not warn if ignore function with func_get_args()
        $this->exportArguments('foo', 'bar');
    }

    // too many parameters
    public function silence(int $a, int $b, int $c, int $d, int $e, int $f, int $g) : array {
        // usage of a silence operator
        return @compact($a);
    }
}