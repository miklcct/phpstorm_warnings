<?php
declare(strict_types=1);

namespace Miklcct\PhpstormWarnings;

use Exception;

class ErrorHandling {
    public function foo() {
        try {
            // exception is never thrown
        } catch (CustomException $e) {
        }
        // unhandled exception
        throw new CustomException();
        try {
            throw new CustomException();
        } catch (Exception $e) {
        } catch (CustomException $e) {
            // wrong catch clause order
        }
    }
}