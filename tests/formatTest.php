<?php
include "./php/utils.php";

class formatTest extends \PHPUnit\Framework\TestCase {
    public function testPositivePrice(){
        $result = getPriceColorClass(10);
        $this->assertTrue($result === "green");
    }

    public function testNegativePrice(){
        $result = getPriceColorClass(-10);
        $this->assertTrue($result === "red");
    }
}