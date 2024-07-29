<?php

namespace Xana\GenHtml\Config;

class Config {
    private static array $defaultClasses = [];

    public static function setDefaultClass(string $elementType, string $class): void {
        self::$defaultClasses[$elementType] = $class;
    }

    public static function getDefaultClass(string $elementType): ?string {
        return self::$defaultClasses[$elementType] ?? null;
    }
}

// Usage example
// Config::setDefaultClass('input', 'form-control');