<?php

use App\Console\Commands\ModelGenerator;
use App\Console\Commands\ModelGeneratorCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Mockery as m;

class ModelGeneratorCommandTest extends TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function Output()
    {
        $tester = new CommandTester(new ModelGeneratorCommand);

        # pass in any argument or options
        $tester->execute(['name'=>'foo']);

        $this->assertEquals("Created app/Foo.php\n",$tester->getDisplay());
    }

    public function GeneratesModelSuccessfully()
    {
        $gen = m::mock(ModelGenerator::class);

        $gen->shouldReceive('make')
            ->once()
            ->with('app/Foo.php')
            ->andReturn(true);

        $command = new ModelGeneratorCommand($gen);

        $tester = new CommandTester($gen);

        # pass in any argument or options
        $tester->execute(['name'=>'foo']);

        $this->assertEquals("Created app/Foo.php\n",$tester->getDisplay());

    }

    public function AlertsUserIfModelGenerationFails()
    {
        $gen = m::mock(ModelGenerator::class);
            # This time, simulate a failed result
        $gen->shouldReceive('make')
            ->once()
            ->with('app/models/Foo.php') ->andReturn(false);

        $command = new ModelGeneratorCommand($gen); $tester = new CommandTester($command);
        $tester->execute(['name' => 'foo']);
        # If generation failed, the output should indicate as much.
        $this->assertEquals(
                "Could not create app/models/Foo.php\n",
                $tester->getDisplay()
            );
    }


    public function CanAcceptCustomPathToModelsDirectory()
    {
        $gen = m::mock(ModelGenerator::class);
            # Ensure that the custom path to the directory is correct
        $gen->shouldReceive('make')
            ->once()
            ->with('app/foo/models/Foo.php');

        $command = new ModelGeneratorCommand($gen);
        $tester = new CommandTester($command);
        $tester->execute(['name' => 'foo', '--path' => 'app/foo/models']);
    }

    public function testEq(){
        $this->assertTrue(true);
    }

}
