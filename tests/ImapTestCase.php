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
    const IMAP_FLAGS = '/imap/ssl/novalidate-cert';

    protected function setUp()
    {
        parent::setUp();

        FileHelper::createDirectory(__DIR__ . '/runtime');

        $imapPath = $this->getServerString(
            \getenv('IMAP_SERVER_NAME'),
            \getenv('IMAP_SERVER_PORT'),
            self::IMAP_FLAGS
        );
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

    private function getServerString(string $hostname, string $port, string $flags): string
    {
        return \sprintf(
            '{%s%s%s}',
            $hostname,
            '' !== $port ? ':' . $port : '',
            $flags
        );
    }
}
