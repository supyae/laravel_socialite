<?php


class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    use \Codeception\Specify;

    protected $tester;

    private $user;
    public function testValidation()
    {
        $this->user = \App\User::create();

        $this->specify("username is required", function() {
            $this->user->username = null;
            //$this->assertFalse($this->user->validate(['name']));
        });

        $this->specify("username is too long", function() {
            $this->user->username = 'toolooooongnaaaaaaameeee';
            //$this->assertFalse($this->user->validate(['name']));
        });

        $this->specify("username is ok", function() {
            $this->user->username = 'davert';
            //$this->assertTrue($this->user->validate(['name']));
        });
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {

    }
}