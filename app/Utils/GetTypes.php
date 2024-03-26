<?php

namespace App\Utils;

trait GetTypes {
    public static function get(string $type): string {
        return constant("self::".$type)->value;
    }

    public static function all(): array {
        $array_enums = [];

        foreach (self::cases() as $case) {
            array_push($array_enums, $case->value);
        }

        return $array_enums;
    }
}
