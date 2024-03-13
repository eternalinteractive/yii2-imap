<?php
/**
 * Product: kekaadrenalin\yii2-imap
 * Date: 14.11.2019
 * Time: 20:32
 * Author: kekaadrenalin
 */

namespace kekaadrenalin\imap;

/**
 * Class ImapConnection
 *
 * @package kekaadrenalin\imap
 */
class ImapConnection
{
    /**
     * @var string
     */
    public $imapPath;

    /**
     * @var string
     */
    public $imapLogin;

    /**
     * @var string
     */
    public $imapPassword;

    /**
     * @var string
     */
    public $serverEncoding;

    /**
     * @var string
     */
    public $attachmentsDir;

    /**
     * @var bool
     */
    public $decodeMimeStr;
}
