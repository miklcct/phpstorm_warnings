<?
// short open tag
declare(strict_types=1);

// class path doesn't match project structure
namespace Foo\Bar;

use NonNamespacedClass;

class CodeStyle {
    public function foo() {
        // array fill can be converted to loop
        array_fill(0, 5, 'x');

        // array filter can be converted to loop
        array_filter(
            // traditional syntax array literal
            array('a', 2, TRUE)
            , function ($x) : bool {
                return is_bool($x);
            }
        );

        // array_map can be converted to loop
        array_map(
            function (int $x) : int {
                return $x + 1;
            }
            , [1, 2, 3]
        );

        // fully-qualified name usage
        new \Miklcct\PhpstormWarnings\SubPackage\Helper();
        // fully-qualified name usage for global namespace
        new \StdClass();
        // unnecessary fully-qualified name
        new \Foo\Bar\CodeSmell(1, 2, 3, 4, 5, 6, 7);
        // unnecessary fully-qualified name for global scope
        new \NonNamespacedClass();

        // loop can be converted to array_fill
        $array_fill = [];
        for ($i = 0; $i < 5; $i++) {
            $array_fill[$i] = 'x';
        }

        // loop can be converted to array_filter
        $array_filter = [];
        foreach (['a', 2, TRUE] as $key => $x) {
            if (is_bool($x)) {
                $array_filter[$key] = $x;
            }
        }

        // loop can be converted to array_map
        $array_map = [];
        foreach ([1, 2, 3] as $key => $x) {
            $array_map[$key] = $x + 1;
        }

        // usages of a variable variable
        $$i;
        $this->$i;
    }
}

// multiple class definitions in one file
class AnotherClass {
}

// redundant closing tag
?>