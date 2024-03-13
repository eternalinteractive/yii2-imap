<?php
/**
 * Product: kekaadrenalin\yii2-imap
 * Date: 14.11.2019
 * Time: 20:32
 * Author: kekaadrenalin
 */

namespace kekaadrenalin\imap;

/**
 * Class IncomingMail
 *
 * @property int    $id
 * @property string $date
 * @property string $subject
 * @property        $fromName
 * @property        $fromAddress
 * @property array  $to
 * @property        $toString
 * @property array  $cc
 * @property array  $replyTo
 * @property        $textPlain
 * @property        $textHtml
 * @property        $messageId
 * @property array  $references
 *
 * @package kekaadrenalin\imap
 */
class IncomingMail
{
    public $id;

    public $date;

    public $subject;

    public $fromName;

    public $fromAddress;

    public $to = [];

    public $toString;

    public $cc = [];

    public $replyTo = [];

    public $textPlain;

    public $textHtml;

    public $messageId;

    public $references = [];

    /** @var IncomingMailAttachment[] */
    protected $attachments = [];

    /**
     * @param IncomingMailAttachment $attachment
     */
    public function addAttachment(IncomingMailAttachment $attachment)
    {
        $this->attachments[$attachment->id] = $attachment;
    }

    /**
     * @return IncomingMailAttachment[]
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param string $baseUri
     *
     * @return string|string[]
     */
    public function replaceInternalLinks(string $baseUri)
    {
        $baseUri = rtrim($baseUri, '\\/') . '/';
        $fetchedHtml = $this->textHtml;
        foreach ($this->getInternalLinksPlaceholders() as $attachmentId => $placeholder) {
            if (isset($this->attachments[$attachmentId])) {
                $fetchedHtml = str_replace($placeholder, $baseUri . basename($this->attachments[$attachmentId]->filePath), $fetchedHtml);
            }
        }

        return $fetchedHtml;
    }

    /**
     * Get array of internal HTML links placeholders
     * @return array|false attachmentId => link placeholder
     */
    public function getInternalLinksPlaceholders()
    {
        return preg_match_all('/=["\'](ci?d:([\w.%*@-]+))["\']/i', $this->textHtml, $matches) ? array_combine($matches[2], $matches[1]) : [];
    }
}
