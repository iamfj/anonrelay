<?php

namespace App\Tests\Library\Mailbox;

use App\Library\Mailbox\MailboxScanner;
use JetBrains\PhpStorm\Pure;
use PhpImap\IncomingMail;
use PhpImap\Mailbox;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MailboxScannerTest extends TestCase {
  #[Pure]
  private static function createIncomingMail(string $from, array $to): IncomingMail {
    $incomingMail = new IncomingMail();
    $incomingMail->fromAddress = $from;
    $incomingMail->to = $to;
    return $incomingMail;
  }
  
  private function createMailboxMock(array $mails): Mailbox|MockObject {
    $mailboxMock = $this->getMockBuilder(Mailbox::class)->disableOriginalConstructor()->getMock();
    $mailboxMock->method('searchMailbox')->willReturn(array_keys($mails));
    $mailboxMock->method('getMail')->willReturnCallback(static function($mailId) use ($mails) {
      return $mails[$mailId];
    });
    return $mailboxMock;
  }
  
  public function testScanMailbox(): void {
    $mailMap = [];
    $mailMap[12] = self::createIncomingMail('support@amazon.com', ['me@anonrelay.local']);
    $mailMap[16] = self::createIncomingMail('support@amazon.com', ['someother@anonrelay.local']);
    
    $mailboxMock = $this->createMailboxMock($mailMap);
    $mailboxScanner = new MailboxScanner();
    $scanResult = $mailboxScanner->scan($mailboxMock);
    
    $this->assertCount(2, $scanResult);
  }
}
