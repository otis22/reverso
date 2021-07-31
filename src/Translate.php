<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use ElegantBro\Interfaces\Arrayee;

final class Translate implements Arrayee
{
    private Language $languageFrom;
    private Language $languageTo;
    private Word $word;

    /**
     * @param Language $languageFrom
     * @param Language $languageTo
     * @param Word $word
     */
    public function __construct(Language $languageFrom, Language $languageTo, Word $word)
    {
        $this->languageFrom = $languageFrom;
        $this->languageTo = $languageTo;
        $this->word = $word;
    }

    public function asArray(): array
    {
        return [
            "source_text" => $this->word->asString(),
            "target_text" => "",
            "source_lang" => $this->languageFrom->asString(),
            "target_lang" => $this->languageTo->asString()
        ];
    }
}
