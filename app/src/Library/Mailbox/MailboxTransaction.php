<?php

namespace App\Library\Mailbox;

use JetBrains\PhpStorm\Pure;

class MailboxTransaction {
  
  /**
   * @param int    $id
   * @param string $from
   * @param array  $to
   */
  private function __construct(private int $id, private string $from, private array $to) {
    // nothing to do here
  }
  
  /**
   * @param int    $id
   * @param string $from
   * @param array  $to
   *
   * @return MailboxTransaction
   */
  #[Pure]
  public static function create(int $id, string $from, array $to): MailboxTransaction {
    return new MailboxTransaction($id, $from, $to);
  }
  
  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }
  
  /**
   * @return string
   */
  public function getFrom(): string {
    return $this->from;
  }
  
  /**
   * @return array
   */
  public function getTo(): array {
    return $this->to;
  }
}