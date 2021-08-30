<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;

use function json_decode;

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

    /**
     * @param ClientInterface $client
     * @param Translation $translation
     * @return static
     * @throws GuzzleException
     * @throws InvalidArgumentException for problem with translation data
     */
    public static function fromTranslation(ClientInterface $client, Translation $translation): self
    {
        return new self(
            json_decode(
                $client->request(
                    "POST",
                    "/bst-query-service",
                    [
                        'headers' =>  [
                            "User-Agent" => "Mozilla/5.0",
                            "Content-Type" => "application/json; charset=UTF-8"
                        ],
                        'body' => json_encode(
                            $translation->asArray()
                        ),
                    ]
                )->getBody()->getContents(),
                true,
                JSON_THROW_ON_ERROR
            )
        );
    }

    /**
     * @param string $languageFrom
     * @param string $languageTo
     * @param string $word
     * @return static
     * @throws GuzzleException
     * @throws InvalidArgumentException for problem with translation data
     */
    public static function fromLanguagesAndWord(string $languageFrom, string $languageTo, string $word): self
    {
        return self::fromTranslation(
            new Client(['base_uri' => 'https://context.reverso.net/translation']),
            new Translation(
                new Language($languageFrom),
                new Language($languageTo),
                new Word($word)
            )
        );
    }

    public function original(): string
    {
        return $this->response['request']['source_text'];
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
