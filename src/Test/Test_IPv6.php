<?php


use PHPUnit\Framework\TestCase;

final class ipTest extends TestCase
{
    public function testSimplifyIPv6()
    {
        //test réaliser selon partition d'équivalence
        $this->assertEquals("0:abcd:ef45:98a3:1234:bc97:ae51:bd5d",simplifyV2("0000:abcd:ef45:98a3:1234:bc97:ae51:bd5d")); //A2.7A3
        $this->assertEquals("::ef45:98a3:1234:bc97:ae51:bd5d",simplifyV2("0000:0000:ef45:98a3:1234:bc97:ae51:bd5d")); //2A2.6A3
        $this->assertEquals("::1234:bc97:ae51:bd5d",simplifyV2("0000:0000:0000:0000:1234:bc97:ae51:bd5d")); //nA2.8-nA3
        $this->assertEquals("abcd:ef45:98a3:1234:bc97:ae51:bd5d:0",simplifyV2("abcd:ef45:98a3:1234:bc97:ae51:bd5d:0000")); //7A3.A2
        $this->assertEquals("abcd:ef45:98a3:1234:bc97:ae51::",simplifyV2("abcd:ef45:98a3:1234:bc97:ae51:0000:0000")); //6A3.2A2
        $this->assertEquals("abcd:ef45:98a3:1234::",simplifyV2("abcd:ef45:98a3:1234:0000:0000:0000:0000")); //8-nA3.nA2
        $this->assertEquals("1:2:3:4:5:6:7:8",simplifyV2("0001:0002:0003:0004:0005:0006:0007:0008")); //8A1
        $this->assertEquals("::ef45:98a3:0:0:ae51:bd5d",simplifyV2("0000:0000:ef45:98a3:0000:0000:ae51:bd5d"));
        $this->assertEquals("0:ef45:98a3:1234:ae51:ae51:bd5d:0",simplifyV2("0000:ef45:98a3:ac91:1234:ae51:bd5d:0000"));
        $this->assertEquals("::1234:ae52:ae51:ac91:bd5d:0",simplifyV2("0000:0000:12345:ae52:ae51:ac91:bd5d:0000"));
    }
}
