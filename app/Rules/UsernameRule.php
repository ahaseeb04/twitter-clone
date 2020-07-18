<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UsernameRule implements Rule
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!preg_match('/^[A-Za-z0-9_]+$/', $value)) {
            return $this->fail('The username can only contain letters, numbers, and underscores.');
        }

        if (in_array($value, config('auth.reserved_usernames'))) {
            return $this->fail('This username is unavailable. Please try a different one.');
        }

        foreach (app()->router->getRoutes() as $route) {
            if (strtolower($route->uri) === strtolower($value)) {
                return $this->fail('This username is unavailable. Please try a different one.');
            }
        }

        foreach (app()->files->glob(public_path() . '/*') as $file) {
            if (strtolower(basename($file)) === strtolower($value)) {
                return $this->fail('This username is unavailable. Please try a different one.');
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Undocumented function
     *
     * @param [type] $message
     * @return void
     */
    protected function fail($message)
    {
        $this->message = $message;

        return false;
    }
}
