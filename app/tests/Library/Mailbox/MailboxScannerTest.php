<?php

namespace App\Tests\Library\Mailbox;

use App\Library\Mailbox\MailboxScanner;
use Ds\Map;
use PhpImap\IncomingMail;
use PhpImap\Mailbox;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MailboxScannerTest extends TestCase {
  private static function createIncomingMail(string $from, array $to): IncomingMail {
    $incomingMail = new IncomingMail();
    $incomingMail->fromAddress = $from;
    $incomingMail->to = $to;
    return $incomingMail;
  }
  
  private function createMailboxMock(Map $mails): Mailbox|MockObject {
    $mailboxMock = $this->getMockBuilder(Mailbox::class)->disableOriginalConstructor()->getMock();
    $mailboxMock->method('searchMailbox')->willReturn($mails->keys()->toArray());
    $mailboxMock->method('getMail')->willReturnCallback(static function($mailId) use ($mails) {
      return $mails->get($mailId);
    });
    return $mailboxMock;
  }
  
  public function testScanMailbox(): void {
    $mailMap = new Map();
    $mailMap->put(12, self::createIncomingMail('support@amazon.com', ['me@anonrelay.local']));
    
    $mailboxMock = $this->createMailboxMock($mailMap);
    $mailboxScanner = new MailboxScanner();
    $scanResult = $mailboxScanner->scan($mailboxMock);
    
    $this->assertCount(1, $scanResult);
  }
}
