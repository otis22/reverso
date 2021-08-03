<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use GuzzleHttp\ClientInterface;

use function json_decode;
use function json_encode;

final class ReversoGateway
{
    private ClientInterface $client;
    private Translation $translation;

    /**
     * @param ClientInterface $client
     * @param Translation $translation
     */
    public function __construct(ClientInterface $client, Translation $translation)
    {
        $this->client = $client;
        $this->translation = $translation;
    }
    /**
     * @return array<string,string>
     */
    private function headers(): array
    {
        return [
            "User-Agent" => "Mozilla/5.0",
            "Content-Type" => "application/json; charset=UTF-8"
        ];
    }

    public function context(): Context
    {
        return new Context(
            json_decode(
                $this->client->request(
                    "POST",
                    "https://context.reverso.net/translation/bst-query-service",
                    [
                        'headers' => $this->headers(),
                        'body' => json_encode(
                            $this->translation->asArray()
                        )
                    ]
                )->getBody()->getContents(),
                true,
                JSON_THROW_ON_ERROR
            )
        );
    }
}
