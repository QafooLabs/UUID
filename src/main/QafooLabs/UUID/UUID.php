<?php
/**
 * This file is part of the QafooLabs UUID Component.
 *
 * @version $Revision$
 */

namespace QafooLabs\UUID;

/**
 * Class representing an UUID identifier.
 */
class UUID
{
    /**
     * Supported UUID types.
     */
    const VERSION_4 = 4;

    /**
     * UUID string representation for the current class instance.
     *
     * @var string
     */
    private $uuid;

    /**
     * Constructs a new UUID instance.
     *
     * @param integer $type
     */
    public function __construct($type = self::VERSION_4)
    {
        $this->uuid = self::generate($type);
    }

    /**
     * Returns the UUID string representation for the current class instance.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->uuid;
    }

    /**
     * Generator method that just generates a textual UUID.
     *
     * @param integer $type
     * @return string
     * @throws \InvalidArgumentException If the given <b>$type</b> does not
     *         reference a supported UUID type.
     */
    public static function generate($type)
    {
        switch ($type) {
            case self::VERSION_4:
                return self::generateVersion4();
        }
        throw new \InvalidArgumentException("Unsupported UUID version {$type}.");
    }

    /**
     * Generates a UUID version 4.
     *
     * @return string
     */
    public static function generateVersion4()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}
