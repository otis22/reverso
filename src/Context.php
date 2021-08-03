<?php

declare(strict_types=1);

namespace Otis22\Reverso;

final class Context
{
    /**
     * @var array<string,mixed>
     */
    private array $response;

    /**
     * @param array<string,mixed> $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function firstInDictionary(): string
    {
        return $this->response['dictionary_entry_list'][0]['term'];
    }

    /**
     * @return string[]
     */
    public function dictionary(): array
    {
        return array_map(
            static fn(array $el): string => $el['term'],
            $this->response['dictionary_entry_list']
        );
    }

    /**
     * @return array<array>
     */
    public function examples(): array
    {
        return array_map(
            static fn(array $el): array => ['source' => $el['s_text'], 'target' => $el['t_text']],
            $this->response['list']
        );
    }
}
