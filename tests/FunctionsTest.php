<?php

require_once "functions.php";

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    // conection_to_database() if it was succesfull (created an PDO object)
    public function testIfTheConnectionToDBReturnsThePDOObjectWhenTheValuesAreCorrect()
    {
        require "admin/config.php";
        $conection = conection_to_database($db_config);

        $this->assertIsObject($conection);
    }

    // conection_to_database() if there was an error and return false
    public function testIfTheConnectionToDBReturnsFalseWhenTheValuesAreWrong()
    {
        require "admin/config.php";

        $db_config["password"] = 1234;
        $conection = conection_to_database($db_config);

        $this->assertIsBool($conection);
    }

    // get_page() should return 1 if $_GET["p"] It is not set
    public function testIfGetPageReturnAValidNumer()
    {
        $this->assertEquals(1, get_page());
    }

    // get_rows()
    // This could generate a problem if
    // coumns name are changed therefore the
    // problem could not be the function
    public function testIfThereIsAProblemWithTheDBWhenAGetTheRowsInIndex()
    {
        require "admin/config.php";

        $conection = conection_to_database($db_config);
        $optional = [
            "order" => "DESC",
            "column" => "date"

        ];

        $this->assertIsNotObject(get_rows($page_config["rows_per_page"], "torrents", $conection, $optional));
    }

    // clean_string()
    public function testIfCleanStringReturnsAValidString()
    {
        $this->assertEquals("Nahuel", clean_string(" Nahuel "));
        $this->assertEquals("&lt;h1&gt;Juan&lt;/h1&gt;", clean_string("<h1>Juan</h1>"));
        $this->assertEquals("Saimon", clean_string("\nSaimon"));
    }

    // get_torrentsize_byts()
    public function testIfTheFunctionThatReturnsTheBytesOfATorrent()
    {
        $this->assertEquals("218956112", get_torrentsize_byts("tests/assets/torrentOne.torrent"));
        $this->assertEquals("308073280", get_torrentsize_byts("tests/assets/torrentTwo.torrent"));
    }

    // bytes_to_string
    public function testFunctionThatReturnsTheBytesInString()
    {
        $this->assertEquals("0 KB", bytes_to_string(3));
        $this->assertEquals("0.5 KB", bytes_to_string(499));
        $this->assertEquals("10 KB", bytes_to_string(10000));
        $this->assertEquals("256.6 KB", bytes_to_string(256582));
        $this->assertEquals("636.6 MB", bytes_to_string(636581232));
        $this->assertEquals("5.8 GB", bytes_to_string(5848419882));
        $this->assertEquals("3.8 TB", bytes_to_string(379845854122));
    }
}

?>