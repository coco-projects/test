<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use Coco\test\Test;
    use PHPUnit\Framework\TestCase;

final class BTest extends TestCase
{
    public $TestObj = null;

    //每次测试之前都会执行的方法，类似 __contruct
    protected function setUp(): void
    {
        $this->TestObj = new Test();
    }

    //每次测试结束都会执行的方法，类似 __destruct
    protected function tearDown(): void
    {
        $this->TestObj = null;
    }

    //实践中这个方法可以查数据库返回
    //数据供给器方法必须是public；返回值可以是数组，或者是实现了Iterator接口的对象。且数组或者迭代的每一个元素都是数组
    //可以添加键名，让输出信息更加详细（只影响错误信息的输出，与结果无关）
    //如果一个测试依赖于一个使用了数据供给器的测试，则仅当被依赖的测试至少能在一组数据上成功的时候，该测试才会运行。使用了数据供给器的测试，其运行结果无法注入到依赖于此测试的其他测试中，无法提供返回值
    public function addDataProvider()
    {
        return [
            [1,2,3],
            [1,3,4],
            [1,9,10],
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 3]
        ];
    }

    /**
     * @dataProvider addDataProvider
     */

    //addDataProvider 方法返回一个数组，每个元素的值都会依次传到这个方法调用
    //如果某方法同时从 @dataProvider 和 @depends 中接收数据，那么来自 @dataProvider 的参数将优先于 @depends
    public function testAdd($a , $b , $sum)
    {
        $this->assertEquals($sum , $a + $b);
    }
}
















