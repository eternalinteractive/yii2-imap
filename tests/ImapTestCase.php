<?php

namespace kekaadrenalinunit\imap;

use kekaadrenalin\imap\Imap;
use Yii;
use yii\helpers\FileHelper;

/**
 * ImapTestCase is the base class for all imap related tests cases
 *
 * @group imap
 */
class ImapTestCase extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        FileHelper::createDirectory(__DIR__ . '/runtime');

        $imapPath = '{' . \getenv('IMAP_SERVER_NAME') . ':' . \getenv('IMAP_SERVER_PORT') . '}INBOX';
        $this->mockApplication([
            'components' => [
                'imap' => [
                    'class' => Imap::class,
                    'connection' => [
                        'imapPath' => $imapPath,
                        'imapLogin' => \getenv('IMAP_USERNAME'),
                        'imapPassword' => \getenv('IMAP_PASSWORD'),
                        'serverEncoding' => 'encoding',
                        'attachmentsDir' => '/',
                        'decodeMimeStr' => false,
                    ],
                ],
            ],
        ]);
    }
}
