<?php

/**
 * Email class file
 *
 * PHP Version 7.1
 *
 * @category Email
 * @package  Email
 * @author   Myriam <haasmyriam8@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://example.com/email
 */

declare(strict_types=1);

/**
 * Email class
 *
 * Check if email is valid
 *
 * @category Email
 * @package  Email
 * @author   Myriam <haasmyriam8@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://example.com/email   
 */

final class Email
{

    private $_email;

     /**
     * Email builder
     *
     * @param string $_email Email
     *
     * @return string  Email
    */
    private function __construct(string $email)
    {
        $this->ensureIsValidEmail($_email);

        $this->email = $_email;
    }

    /**
     * Email from string
     *
     * @param string $_email Email
     *
     * @return string  Email
    */
    public static function fromString(string $_email): self
    {
        return new self($_email);
    }

     /**
     * Email to string
     *
     * @return string Email
    */
    public function __toString(): string
    {
        return $this->_email;
    }

    /**
     * Get the ingredients
     *
     * @param string $_email Email
     *
     * @return string  If not valid
    */
    private function _ensureIsValidEmail(string $_email): void
    {
        if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $_email
                )
            );
        }
    }
}