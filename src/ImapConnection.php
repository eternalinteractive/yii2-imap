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
 * @property string $imapPath
 * @property string $imapLogin
 * @property string $imapPassword
 * @property string $serverEncoding
 * @property string $attachmentsDir
 * @property bool   $decodeMimeStr
 *
 * @package kekaadrenalin\imap
 */
class ImapConnection
{
    public $imapPath;

    public $imapLogin;

    public $imapPassword;

    public $serverEncoding;

    public $attachmentsDir;

    public $decodeMimeStr;
}
