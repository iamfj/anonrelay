<?php

namespace App\Tests\Library\Mailbox;

use App\Library\Mailbox\MailboxTransaction;
use PHPUnit\Framework\TestCase;

class MailboxTransactionTest extends TestCase {
  public function testMailboxTransactionCreation(): void {
    $transaction = MailboxTransaction::create(42, 'support@amazon.com', ['something@anonrelay.local']);
    $this->assertSame(42, $transaction->getId());
    $this->assertSame('support@amazon.com', $transaction->getFrom());
    $this->assertSame(['something@anonrelay.local'], $transaction->getTo());
  }
}
