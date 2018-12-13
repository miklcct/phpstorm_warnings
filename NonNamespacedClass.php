<?php
declare(strict_types=1);

class NonNamespacedClass {
    // old style constructor
    public function NonNamespacedClass() {
    }
}

// unnecessary fully-qualified name in file scope
new \NonNamespacedClass();