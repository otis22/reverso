<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use ElegantBro\Interfaces\Stringify;

final class Word implements Stringify
{
    private string $word;

    /**
     * @param string $word
     */
    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function asString(): string
    {
        $word = trim($this->word);
        if (strpos(trim($word), ' ') !== false) {
            throw new \InvalidArgumentException("$word must be only one word");
        }
        return $word;
    }

}
