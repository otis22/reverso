<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{
    public function testAsArrayWithValidParametersRightSourceTextParameter(): void
    {
        $this->assertEquals(
            (
                new Translation(
                    new Language("en"),
                    new Language('ru'),
                    new Word("test")
                )
            )->asArray()['source_text'],
            "test"
        );
    }

    public function testWordWithPhraseInsteadAWord(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $sut = new Word('this is a test phrase');
    }

    public function testLanguageWithInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $sut = new Language('klingon');
    }
}
