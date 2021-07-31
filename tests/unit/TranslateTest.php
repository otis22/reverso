<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use PHPUnit\Framework\TestCase;

class TranslateTest extends TestCase
{
    public function testAsArrayWithValidParametersRightSourceTextParameter(): void
    {
        $this->assertEquals(
            (
                new Translate(
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
        $sut = new Word('this is a test phrase');
        $this->expectException(\InvalidArgumentException::class);
        $sut->asString();
    }

    public function testLanguageWithInvalidValue(): void
    {
        $sut = new Language('klingon');
        $this->expectException(\InvalidArgumentException::class);
        $sut->asString();
    }
}
