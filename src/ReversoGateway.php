<?php

declare(strict_types=1);

namespace Otis22\Reverso;

use GuzzleHttp\ClientInterface;

final class ReversoGateway
{
    private ClientInterface $client;
    private string $languageFrom;
    private string $languageTo;
    private string $word;

}
