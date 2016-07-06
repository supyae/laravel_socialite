<?php


class SaveUserTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    protected $tester;
    protected $user;
    protected $post;

    function testUser()
    {
        $this->user = 'davert';
        $this->post = 'hello world';

        $this->specifyConfig()
            ->cloneOnly('user');

        $this->specify('post is not cloned', function() {
            $this->user = 'john';
            $this->post = 'bye world';
        });

        $this->assertEquals('davert', $this->user); // user is restored
        $this->assertEquals('bye world', $this->post); // post was not stored
    }

    function testUserSaving(){
        $user = new \App\User();

        $user->setAttribute('name','Su Pyae');
        $user->setAttribute('email','supyae@gmail.com');
        $user->setAttribute('password','password');
        $user->save();

       // $this->assertEquals('john', $user->getAttributeValue('name'));
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }
}