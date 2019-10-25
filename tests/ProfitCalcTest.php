<?php

use Money\Money;
use PHPUnit\Framework\TestCase;

final class ProfitCalcTest extends TestCase {
	protected function setUp() : void {
		ProfitCalc::set_currency('USD');
	}

	public function testParseCurrency() : void {
		$this->assertInstanceOf(Money::class, ProfitCalc::parse_currency('10.00'));
	}

	public function testParseCurrencyInvalid() : void {
		$this->expectException(InvalidArgumentException::class);
		ProfitCalc::parse_currency('-10.00');
	}

	public function testCalculateProfit() : void {
		$this->assertSame('6.50', ProfitCalc::get_profit('10.00', '3.50'));
	}
}
