<?php

/**
 * Helper class for session flash messages
 */
class SessionFlashHelper
{
    /**
     * Set a flash message in the session
     */
    public static function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a flash message from the session
     */
    public static function get(string $key): ?string
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $value;
        }
        return null;
    }
}