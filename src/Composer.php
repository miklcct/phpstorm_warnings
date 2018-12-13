<?php
declare(strict_types=1);

namespace Miklcct\PhpstormWarnings;

// ext-json is missing in composer.json
use function json_encode;

class Composer {
    public function foo() {
        // ext-json is missing in composer.json
        return json_encode('foo');
    }
}