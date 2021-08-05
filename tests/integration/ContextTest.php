<?php

declare(strict_types=1);

namespace Otis22\Reverso\Integration;

use PHPUnit\Framework\TestCase;
use Otis22\Reverso\Context;

class ContextTest extends TestCase
{
    public function testFromLanguagesAndWord(): void
    {
        $this->assertEquals(
            "example",
            Context::fromLanguagesAndWord("ru", "en", "пример")
                ->firstInDictionary()
        );
    }
}
