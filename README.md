yii2 Imap
==========

[![Total Downloads](https://img.shields.io/packagist/dt/kekaadrenalin/yii2-imap.svg?style=flat-square)](https://packagist.org/packages/kekaadrenalin/yii2-imap) 


This library is a fork of https://github.com/yiioverflow/yii2-imap

Installation by composer
------------
```composer
{
    "require": {
       "kekaadrenalin/yii2-imap": "dev-master"
    }
}

Or

$ composer require kekaadrenalin/yii2-imap "dev-master"
```

# Use as component

Connection details define in component

```php
'components' => [
    ...
    'imap' => [
        'class' => 'kekaadrenalin\imap\Imap',
        'connection' => [
            'imapPath'       => '{imap.gmail.com:993/imap/ssl}INBOX',
            'imapLogin'      => 'username',
            'imapPassword'   => 'password',
            'serverEncoding' => 'encoding', // utf-8 default.
            'attachmentsDir' => '/',
            'decodeMimeStr'  => true, // Return as is, default -> true
        ],
    ],
    ...
 ],

$mailbox = new kekaadrenalin\Mailbox(Yii::$app->imap->connection);
```

# Usage as library

Connection details set on fly

```php
$imapConnection = new kekaadrenalin\imap\ImapConnection;

$imapConnection->imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
$imapConnection->imapLogin = 'username';
$imapConnection->imapPassword = 'password';
$imapConnection->serverEncoding = 'encoding'; // utf-8 default.
$imapConnection->attachmentsDir = '/';
$imapConnection->decodeMimeStr = true;

$mailbox = new kekaadrenalin\Mailbox($imapConnection);
```

# To get all mails and its index
```php
$mailIds = $mailbox->searchMailBox(); // Gets all Mail ids.
print_r($mailIds);
```

# Do not read attachments
```php
$mailbox->readMailParts = false;
```

# To read Inbox contents
```php
foreach($mailIds as $mailId)
{
    // Returns Mail contents
    $mail = $mailbox->getMail($mailId); 

    // Read mail parts (plain body, html body and attachments
    $mailObject = $mailbox->getMailParts($mail);
    
    // Array with IncomingMail objects
    print_r($mailObject);

    // Returns mail attachements if any or else empty array
    $attachments = $mailObject->getAttachments(); 
    foreach($attachments as $attachment){
        echo ' Attachment:' . $attachment->name . PHP_EOL;
        
        // Delete attachment file
        unlink($attachment->filePath);
    }
}
```

# To Mark and delete mail from IMAP server.
```php
$mailbox->deleteMail($mailId); // Mark a mail to delete
$mailbox->expungeDeletedMails(); // Deletes all marked mails
```

# Contribute
Feel free to contribute. If you have ideas for examples, add them to the repo and send in a pull request.

# Appreciate
Don't forget to leave me a "star" if you like it. Enjoy coding!
