<?php

use \Rhino\Luhn\Luhn as Luhn;


class LuhnTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Luhn
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Luhn("378776168461597");
    }

    public function provider() {
        $data[] = array("378776168461597");
        $data[] = array("5532691160651602grt");
        $data[] = array(79927398713);
        return $data;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * @covers Luhn::validLuhn
     * @dataProvider provider
     */
    public function testValidLuhn($number) {
        $this->object->setVals($number, true);
        $this->assertTrue($this->object->validLuhn());
    }

    /**
     * @covers Luhn::calculateSumTotal
     * @dataProvider provider
     */
    public function testCalculateSumTotal($number) {
        $number = Luhn::toInt($number);
        $checkSum = Luhn::calculateSumTotal($number);
        $this->assertEquals(0, $checkSum % 10);
    }

    /**
     * @covers Luhn::toInt
     * @dataProvider provider
     */
    public function testToInt($number) {
        $int = Luhn::toInt($number);
        $this->assertTrue(is_numeric($int));
    }

    /**
     * @covers Luhn::setVals
     */
    public function testSetNumber() {
        $this->object->setVals("5237467072528164");
    }

}
