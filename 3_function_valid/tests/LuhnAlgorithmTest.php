<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class LuhnAlgorithmTest extends TestCase
{
    private $validCard;
    /**
     * LuhnAlgorithmTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        include "LuhnAlgorithm.php";
        $this->validCard = new LuhnAlgorithm;
    }
    /**
     * Test class to value cannot empty
     */
    function testStringCannotBeEmpty() {
        $this->asserteFals($this->validCard->validation(''));
        $this->assertFals($this->validCard->validation('111111'));
    }
}
