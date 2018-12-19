<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\Form\Tests\Form\Handler;

use Core23\Form\Tests\Fixtures\SimpleFormHandler;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AbstractFormHandlerTest extends TestCase
{
    public function testHandle(): void
    {
        $request = $this->createMock(Request::class);

        $response = $this->createMock(Response::class);

        $form = $this->createMock(FormInterface::class);
        $form->expects($this->once())->method('handleRequest')
            ->with($this->equalTo($request));
        $form->expects($this->once())->method('isValid')
            ->willReturn(true);
        $form->expects($this->once())->method('isSubmitted')
            ->willReturn(true);

        $handler = new SimpleFormHandler();

        $result = $handler->handle($form, $request, function () use ($response) {
            return $response;
        });

        $this->assertSame($response, $result);
    }

    /**
     * @expectedException \Core23\Form\Handler\Exception\InvalidCallbackException
     */
    public function testHandleInvalidCallback(): void
    {
        $request = $this->createMock(Request::class);

        $form = $this->createMock(FormInterface::class);
        $form->expects($this->once())->method('handleRequest')
            ->with($this->equalTo($request));
        $form->expects($this->once())->method('isValid')
            ->willReturn(true);
        $form->expects($this->once())->method('isSubmitted')
            ->willReturn(true);

        $handler = new SimpleFormHandler();

        $handler->handle($form, $request, function () {
            return null;
        });
    }
}
