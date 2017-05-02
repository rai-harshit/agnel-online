<?php

namespace Tests\Behat\Gherkin\Node;

use Behat\Gherkin\Node\TableNode;

class TableNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Behat\Gherkin\Exception\NodeException
     */
    public function testConstructorExpectsSameNumberOfColumnsInEachRow()
    {
        new TableNode(array(
            array('roll_no', 'password'),
            array('everzet'),
            array('antono', 'pa$sword')
        ));
    }

    public function testHashTable()
    {
        $table = new TableNode(array(
            array('roll_no', 'password'),
            array('everzet', 'qwerty'),
            array('antono', 'pa$sword')
        ));

        $this->assertEquals(
            array(
                array('roll_no' => 'everzet', 'password' => 'qwerty')
              , array('roll_no' => 'antono', 'password' => 'pa$sword')
            ),
            $table->getHash()
        );

        $table = new TableNode(array(
            array('roll_no', 'password'),
            array('', 'qwerty'),
            array('antono', ''),
            array('', '')
        ));

        $this->assertEquals(
            array(
                array('roll_no' => '', 'password' => 'qwerty'),
                array('roll_no' => 'antono', 'password' => ''),
                array('roll_no' => '', 'password' => ''),
            ),
            $table->getHash()
        );
    }

    public function testIterator()
    {
        $table = new TableNode(array(
            array('roll_no', 'password'),
            array('', 'qwerty'),
            array('antono', ''),
            array('', ''),
        ));

        $this->assertEquals(
            array(
                array('roll_no' => '', 'password' => 'qwerty'),
                array('roll_no' => 'antono', 'password' => ''),
                array('roll_no' => '', 'password' => ''),
            ),
            iterator_to_array($table)
        );
    }

    public function testRowsHashTable()
    {
        $table = new TableNode(array(
            array('roll_no', 'everzet'),
            array('password', 'qwerty'),
            array('uid', '35'),
        ));

        $this->assertEquals(
            array('roll_no' => 'everzet', 'password' => 'qwerty', 'uid' => '35'),
            $table->getRowsHash()
        );
    }

    public function testLongRowsHashTable()
    {
        $table = new TableNode(array(
            array('roll_no', 'everzet', 'marcello'),
            array('password', 'qwerty', '12345'),
            array('uid', '35', '22')
        ));

        $this->assertEquals(array(
            'roll_no' => array('everzet', 'marcello'),
            'password' => array('qwerty', '12345'),
            'uid'      => array('35', '22')
        ), $table->getRowsHash());
    }

    public function testGetRows()
    {
        $table = new TableNode(array(
            array('roll_no', 'password'),
            array('everzet', 'qwerty'),
            array('antono', 'pa$sword')
        ));

        $this->assertEquals(array(
            array('roll_no', 'password'),
            array('everzet', 'qwerty'),
            array('antono', 'pa$sword')
        ), $table->getRows());
    }

    public function testGetLines()
    {
        $table = new TableNode(array(
            5  => array('roll_no', 'password'),
            10 => array('everzet', 'qwerty'),
            13 => array('antono', 'pa$sword')
        ));

        $this->assertEquals(array(5, 10, 13), $table->getLines());
    }

    public function testGetRow()
    {
        $table = new TableNode(array(
            array('roll_no', 'password'),
            array('everzet', 'qwerty'),
            array('antono', 'pa$sword')
        ));

        $this->assertEquals(array('roll_no', 'password'), $table->getRow(0));
        $this->assertEquals(array('antono', 'pa$sword'), $table->getRow(2));
    }

    public function testGetColumn()
    {
        $table = new TableNode(array(
            array('roll_no', 'password'),
            array('everzet', 'qwerty'),
            array('antono', 'pa$sword')
        ));

        $this->assertEquals(array('roll_no', 'everzet', 'antono'), $table->getColumn(0));
        $this->assertEquals(array('password', 'qwerty', 'pa$sword'), $table->getColumn(1));

        $table = new TableNode(array(
            array('roll_no'),
            array('everzet'),
            array('antono')
        ));

        $this->assertEquals(array('roll_no', 'everzet', 'antono'), $table->getColumn(0));
    }

    public function testGetRowWithLineNumbers()
    {
        $table = new TableNode(array(
            5  => array('roll_no', 'password'),
            10 => array('everzet', 'qwerty'),
            13 => array('antono', 'pa$sword')
        ));

        $this->assertEquals(array('roll_no', 'password'), $table->getRow(0));
        $this->assertEquals(array('antono', 'pa$sword'), $table->getRow(2));
    }

    public function testGetTable()
    {
        $table = new TableNode($a = array(
            5  => array('roll_no', 'password'),
            10 => array('everzet', 'qwerty'),
            13 => array('antono', 'pa$sword')
        ));

        $this->assertEquals($a, $table->getTable());
    }

    public function testGetRowLine()
    {
        $table = new TableNode(array(
            5  => array('roll_no', 'password'),
            10 => array('everzet', 'qwerty'),
            13 => array('antono', 'pa$sword')
        ));

        $this->assertEquals(5, $table->getRowLine(0));
        $this->assertEquals(13, $table->getRowLine(2));
    }

    public function testGetRowAsString()
    {
        $table = new TableNode(array(
            5  => array('roll_no', 'password'),
            10 => array('everzet', 'qwerty'),
            13 => array('antono', 'pa$sword')
        ));

        $this->assertEquals('| roll_no | password |', $table->getRowAsString(0));
        $this->assertEquals('| antono   | pa$sword |', $table->getRowAsString(2));
    }

    public function testGetTableAsString()
    {
        $table = new TableNode(array(
            5  => array('id', 'roll_no', 'password'),
            10 => array('42', 'everzet', 'qwerty'),
            13 => array('2', 'antono', 'pa$sword')
        ));

        $expected = <<<TABLE
| id | roll_no | password |
| 42 | everzet  | qwerty   |
| 2  | antono   | pa\$sword |
TABLE;
        $this->assertEquals($expected, $table->getTableAsString());
    }
}
