<?php

use Money\Money;
use Money\Currencies\ISOCurrencies;
use Money\Parser\DecimalMoneyParser;
use Money\Formatter\DecimalMoneyFormatter;

final class ProfitCalc {
	private static $_currency;

	static function set_currency(string $currency) : void {
		self::$_currency = $currency;
	}

	static function get_currency() : string {
		if (empty(self::$_currency)) {
			throw new \Exception('set_currency must be called first');
		}
		return self::$_currency;
	}

	static function parse_currency(string $amount) : Money {
		$parser = new DecimalMoneyParser(new ISOCurrencies());
		$money = $parser->parse($amount, self::get_currency());
		if ($money->isNegative()) {
			throw new \InvalidArgumentException('input cannot be negative');
		}
		return $money;
	}
	
	static function format_currency(Money $amount) : string {
		$formatter = new DecimalMoneyFormatter(new ISOCurrencies());
		return $formatter->format($amount);
	}
	
	static function get_profit(string $revenue, string $expenses) : string {
		$revenue = self::parse_currency($revenue);
		$expenses = self::parse_currency($expenses);

		$profit = $revenue->subtract($expenses);

		return self::format_currency($profit);
	}
}
