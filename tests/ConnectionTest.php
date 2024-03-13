<?php

namespace kekaadrenalinunit\imap;

use kekaadrenalin\imap\Imap;
use kekaadrenalin\imap\Mailbox;
use Yii;

class ConnectionTest extends ImapTestCase
{
    public function testCreator()
    {
        /** @var Imap $imap */
        $imap = Yii::$app->get('imap');
        $mailbox = new Mailbox($imap->connection);

        $this->assertNotFalse($mailbox->checkMailbox());
    }
}
