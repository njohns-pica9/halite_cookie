<?php
class HaliteTest extends PHPUnit_Framework_TestCase
{
    public function testCrypto()
    {
        $halite = new \ParagonIE\Halite\Cookie(
            \str_repeat('A', \Sodium::CRYPTO_SECRETBOX_KEYBYTES)
        );
        $msg = 'We attack at dawn.';
        
        $encrypted = $halite->encrypt($msg);
        $this->assertTrue(!empty($encrypted));
        $decrypted = $halite->decrypt($msg);
        $this->assertTrue($decrypted === $msg);
    }
}