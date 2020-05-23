	<?php
    interface Equipment {
	    public function applyStats();
	}

class Gun implements Equipment
{
	public function applyStats()
	{
		$this->offense + 30;
	}
}
