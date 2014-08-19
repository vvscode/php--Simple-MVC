<?php
namespace test;

require_once __DIR__.'/../inc/inc.php';

class UserModelTest extends \PHPUnit_Framework_TestCase {
//    public function testFailExample(){
//        $this->assertTrue(FALSE, 'Example for failing test case');
//    }

    public function testSuccessExample(){
        $this->assertTrue(TRUE, 'Example for successed test case');
    }

    public function testUserGetList(){
        $this->assertTrue(method_exists('\UserModel', 'getList'), 'UserModel should have getList method');

        $arr = \UserModel::getList();
        $this->assertTrue(is_array($arr), '\User::getList result should be an array');

        $this->assertTrue(method_exists('\UserModel', 'findBy'), 'UserModel should have findBy method');
        $user1 = \UserModel::findBy(array('id' => 1));
        $this->assertInstanceOf('\UserModel', $user1, 'If user exists - findBy should return UserModel');
        $userNotExists = \UserModel::findBy(array('id' => null));
        $this->assertNull($userNotExists, 'If user not exists - findBy should return null');
    }
}
 