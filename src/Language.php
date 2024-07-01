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
        'ar',
        'de',
        'en',
        'es',
        'fr',
        'he',
        'it',
        'ja',
        'pt',
        'ro',
        'ru',
        'zh'
    ];

    /**
     * @param string $language
     */
    public function __construct(string $language)
    {
        if (!in_array($language, $this->validLanguagesList)) {
            throw new \InvalidArgumentException(
                "Language {$language} is not exists in the list of valid languages " . implode(
                    ',',
                    $this->validLanguagesList
                )
            );
        }
        $this->language = $language;
    }

    public function asString(): string
    {
        return $this->language;
    }
}
