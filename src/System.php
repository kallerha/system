<?php

declare(strict_types=1);

namespace FluencePrototype\System;

use JetBrains\PhpStorm\NoReturn;
use JsonException;

class System
{

    public static function dumpVarAsJson(mixed $var): void
    {
        try {
            header(header: 'Content-Type: application/json; charset=utf-8');

            echo str_replace('\t', ' ', json_encode($var,
                JSON_INVALID_UTF8_SUBSTITUTE |
                JSON_PARTIAL_OUTPUT_ON_ERROR |
                JSON_PRESERVE_ZERO_FRACTION |
                JSON_UNESCAPED_LINE_TERMINATORS |
                JSON_UNESCAPED_UNICODE |
                JSON_THROW_ON_ERROR
            ));

            exit;
        } catch (JsonException) {
        }
    }

    #[NoReturn] public static function dumpVarAsPlainText(mixed $var): void
    {
        header(header: 'Content-Type: text/plain; charset=utf-8');
        print_r($var);

        exit;
    }

}