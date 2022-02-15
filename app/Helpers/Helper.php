<?php

namespace App\Helpers;

use League\CommonMark\CommonMarkConverter;

class Helper
{
    public static function convertMarkdown(string $string) {
        $markdown_converter = new CommonMarkConverter();

        $converted_string = $markdown_converter->convert($string);

        return $converted_string;
    }
}