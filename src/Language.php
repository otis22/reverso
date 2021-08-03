<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use ElegantBro\Interfaces\Stringify;

final class Language implements Stringify
{
    private string $language;
    /**
     * @var array<string>
     */
    private array $validLanguagesList = [
        'en',
        'fr',
        'es',
        'de',
        'it',
        'pt',
        'ru',
        'ro',
        'cz',
        'zh'
    ];

    /**
     * @param string $language
     */
    public function __construct(string $language)
    {
        $this->language = $language;
    }

    public function asString(): string
    {
        if (!in_array($this->language, $this->validLanguagesList)) {
            throw new \InvalidArgumentException(
                "Language {$this->language} is not exists in the list of valid languages " . join(
                    ',',
                    $this->validLanguagesList
                )
            );
        }
        return $this->language;
    }
}
