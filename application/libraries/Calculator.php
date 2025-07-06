<?php
class Calculator
{
	public $step_total = 4;
	public $person_per_step = 4;
	public $discount_percent = 5.3;
	public $platform_fee = 3;
	public $close_step = 4;
	public $person_sum;
	public $person_max;
	public $person;
	public $price_include_vat = 0;
	public $weekday = 0;
	public $weekend = 0;
	public $length = 0;

	function __construct($config = array())
	{
		if (!empty($config))
		{
			$this->initialize($config);
		}

		$this->person_max = round($this->step_total * $this->person_per_step * 1.2);

	}

	function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			$this->{$key} = $val;
		}
	}

	function price()
	{
		return round(($this->fee() + $this->price_exclude_vat()) * 107 / 100);
	}

	function refund()
	{
		return $this->price_discount() - $this->price_close();
	}

	function price_close()
	{
		return round($this->price_include_vat * pow((100-$this->discount_percent)/100,$this->close_step));
	}

	function price_discount()
	{
		return round($this->price_include_vat * pow((100-$this->discount_percent)/100,$this->discount_step()));
	}

	function price_exclude_vat()
	{
		return round($this->price_discount() * 100 / 107);
	}

	function vat()
	{
		return $this->price_discount() - $this->price_exclude_vat();
	}

	function person_max()
	{
		return round($this->step_total * $this->person_per_step * 1.2);
	}

	function fee()
	{
		return round($this->price_exclude_vat() * $this->platform_fee * $this->fee_step() / 100);
	}

	function fee_include_vat()
	{
		return round($this->fee() * 107 / 100);
	}

	function discount_step()
	{
		$total = $this->person_sum + $this->person;
		if($total < $this->person_per_step)
			return 0;
		elseif(($total >= $this->person_per_step)&&($total < $this->person_per_step*2))
			return 1;
		elseif(($total >= $this->person_per_step*2)&&($total < $this->person_per_step*3))
			return 2;
		elseif(($total >= $this->person_per_step*3)&&($total < $this->person_per_step*4))
			return 3;
		elseif(($total >= $this->person_per_step*4)&&($total <= $this->person_max()))
			return 4;
	}

	function fee_step()
	{
		$total = $this->person_sum + 1;
		if($total < $this->person_per_step)
			return 0;
		elseif(($total >= $this->person_per_step)&&($total < $this->person_per_step*2))
			return 1;
		elseif(($total >= $this->person_per_step*2)&&($total < $this->person_per_step*3))
			return 2;
		elseif(($total >= $this->person_per_step*3)&&($total < $this->person_per_step*4))
			return 3;
		elseif(($total >= $this->person_per_step*4)&&($total <= $this->person_max()))
			return 4;
	}

	public function __toString()
    {
        return "Calculator Class";
    }
}
?>