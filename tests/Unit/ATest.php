<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use Coco\test\Test;
    use PHPUnit\Framework\TestCase;

    final class ATest extends TestCase
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

        /**
         * @test
         */
        //也可以在注释中使用 @test 标注，两种方法都可以，必须使用一种
        public function getId()
        {
            $string = 'Coco\test\Test::getMethod';

            // 主要使用assert断言，对实际值和期望值的匹配进行判断
            $this->assertEquals($string, $this->TestObj->getMethod());
        }

        public function testA()
        {
            //若没有断言，则依赖于它的 testC 会被跳过，不执行
            $this->assertTrue(true, 'hello0');

            return __METHOD__;
        }

        public function testB()
        {
            $this->assertTrue(true);

            return __METHOD__;
        }

        /**
         * @depends testA
         * @depends testB
         */
        // 可以通过添加@depends 申明依赖，就是测试 testC 的时候，依赖 testA 和 testB 的执行结果
        // PHPUnit不会因为依赖关系而更改test的执行顺序，仍然会根据test在代码中的编写顺序进行执行，所以需要自行保证被依赖的方法出现在依赖之前
        // 默认情况下，返回值是按照原样记性传递，即传对象则将传引用。如果想要传副本，则使用 @depends clone 进行代替
        // $a 返回值来源于 testA 的返回值
        // $b 返回值来源于 testB 的返回值
        public function testC($a, $b)
        {
            $this->assertTrue(true);
            echo $a;
            echo PHP_EOL;
            echo $b;
        }

    }
