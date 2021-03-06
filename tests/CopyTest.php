<?php

namespace Tests;

use Flynax\Component\Filesystem;

class CopyTest extends \PHPUnit\Framework\TestCase
{
    public static function tearDownAfterClass()
    {
        $filesystem = new Filesystem();
        $filesystem->remove(__DIR__ . '/tmp');
    }

    /**
     * @dataProvider filenamesProvider
     */
    public function testCopyFilesAndDirectories(Filesystem $filesystem, $source, $target)
    {
        $result = $filesystem->copy($source, $target);
        $success = ($result && file_exists($target));

        $this->assertTrue($success);
    }

    public function filenamesProvider()
    {
        $filesystem = new Filesystem();

        $example_dir = __DIR__ . '/tmp/example_dir';
        $filesystem->mkdir($example_dir);

        $example_file = $example_dir . '/example_file';
        file_put_contents($example_file, 'Generated by PHPUnit Framework');

        return array(
            array($filesystem, $example_file, $example_file . '_copy'),
            array($filesystem, $example_dir, $example_dir . '_copy'),
        );
    }
}
