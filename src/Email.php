<?php
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
    private $email;

    /**
    * Email builder
    *
    * @param string $email Email
    *
    * @return string  Email
    */
    private function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    /**
     * Email from string
     *
     * @param string $email Email
     *
     * @return Email  Email
    */
    public static function fromString(string $email): self
    {
        return new self($email);
    }

    /**
    * Email to string
    *
    * @return string Email
    */
    public function __toString(): string
    {
        return $this->email;
    }

    /**
     * Is valid email
     *
     * @param string $email Email
     *
     * @return string  If not valid
    */
    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }
}
