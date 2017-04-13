<?php
namespace App\Tests\Bootstrap;

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use \GuzzleHttp\Client as GuzzleClient;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Inelo\Numco\Numco;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $arrayToCompress;
    private $compressed;
    private $decompressed;
    /**
     * @Given i have a JSON array to compress :jsonArray
     */
    public function iHaveAJsonArrayToCompress($jsonArray)
    {
        $this->arrayToCompress = json_decode($jsonArray);
    }

    /**
     * @Given i compress it using Numco-PHP
     */
    public function iCompressItUsingNumcoPhp()
    {
        $this->compressed = Numco::compress($this->arrayToCompress);
    }

    /**
     * @Given i decompress using Numco-JS
     */
    public function iDecompressUsingNumcoJs()
    {
        exec("node ../tools/numco-decompress.js ".$this->compressed ." 2>&1", $output, $return);
        $this->decompressed = json_decode($output[0]);
    }

    /**
     * @Then the resoult array is the same as array to compress
     */
    public function theResoultArrayIsTheSameAsArrayToCompress()
    {
        $diffA = array_diff($this->arrayToCompress, $this->decompressed);
        $diffB = array_diff($this->decompressed, $this->arrayToCompress);

        if (!empty($diffA) || !empty($diffB)) {
            print_r($diffA);
            print_r($diffB);
            throw new Exception("Arrays are not the same!");
        }
    }

    /**
     * @Given i compress it using Numco-JS
     */
    public function iCompressItUsingNumcoJs()
    {
        exec("node ../tools/numco-compress.js ".json_encode($this->arrayToCompress)." 2>&1", $output, $return);
        $this->compressed = $output[0];
    }

    /**
     * @Given i decompress using Numco-PHP
     */
    public function iDecompressUsingNumcoPhp()
    {
        $this->decompressed = Numco::decompress($this->compressed);
    }

}