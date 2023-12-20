<?php


use PHPUnit\Framework\TestCase;
//Partition : , , , , , , melange plusieur "0000" d'afilé
$ipv6_a = ["0000:0000:abcd:1234:b123:dc12:87aa:bbcc","0000:0000:0000:0000:0000:0000:1234:1234"]; // 2/+ "0000" deb
$ipv6_b = ["abcd:1234:b123:dc12:87aa:bbcc:0000:0000","1234:1234:0000:0000:0000:0000:0000:0000"]; // 2/+ "0000" fin
$ipv6_c = ["0000:abcd:1234:b123:dc12:87aa:bbcc:98dc"]; // 1 "0000" deb
$ipv6_d = ["abcd:1234:b123:dc12:87aa:bbcc:98dc:0000"]; // 1 "0000" fin
$ipv6_e = ["abcd:0034:b123:0c12:87aa:bbcc:98dc:ab54"]; // 1/+ 0 deb byte
$ipv6_f = ["abcd:1234:b123:dc12:8700:b0cc:98dc:ab54"]; // cas général
$ipv6_g = ["0000:0000:0023:0000:8745:0000:0000:"]; // mélange du tout


final class TrueTest extends TestCase
{
    public function testSimplifyIPv6()
    {
        $this->assertTrue(false);
    }
}
