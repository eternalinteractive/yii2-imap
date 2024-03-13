<?php

namespace kekaadrenalinunit\imap;

use kekaadrenalin\imap\Imap;
use Yii;

class ComponentTest extends ImapTestCase
{
    public function testCreator()
    {
        $imap = Yii::$app->get('imap');

        $this->assertInstanceOf(Imap::class, $imap);
    }
}
