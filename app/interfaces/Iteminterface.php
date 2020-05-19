	<?php
    interface Item {
	    public function applyEffect();
	}

    class GeneralFood implements Item
    {
        private $feed;

        public function __construct($feed)
        {
            $this->feed = $feed;
        }

        public function applyEffect()
        {
	    // heal player for 50 HP
	    }
	}

	class GeneralMedicalkit implements Item {

        private $heal;

        public function __construct($heal)
        {
            $this->heal = $heal;
        }

        public function applyEffect()
        {
	    // reduce hospital stay time
        }
	}

    class GeneralCloth implements Item
    {
        private $wear;

        public function __construct($wear)
        {
            $this->wear = $wear;
        }

        public function applyEffect()
        {
            // reduce hospital stay time
        }
    }

    class GeneralWeapon implements Item
    {
        private $hit;

        public function __construct($hit)
        {
            $this->hit = $hit;
        }

        public function applyEffect()
        {
            // reduce hospital stay time
        }
    }

    class GeneralDrug implements Item
    {
        private $boost;

        public function __construct($boost)
        {
            $this->boost = $boost;
        }

        public function applyEffect()
        {
            // reduce hospital stay time
        }
    }
