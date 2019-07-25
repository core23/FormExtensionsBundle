<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\Form\Handler;

use Core23\Form\Handler\Exception\InvalidCallbackException;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractFormHandler implements FormHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    final public function handle(FormInterface $form, Request $request, callable $callback): ?Response
    {
        if ($response = $this->preProcess($form, $request)) {
            return $response;
        }

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return null;
        }

        if ($response = $this->validate($form, $request)) {
            return $response;
        }

        if (!$this->process($form, $request)) {
            return null;
        }

        if (!\is_callable($callback)) {
            throw new InvalidCallbackException('No valid callable.');
        }

        $response = $callback();

        if (!$response instanceof Response) {
            throw new InvalidCallbackException('Invalid callback response.');
        }

        if ($response = $this->postProcess($form, $request, $response)) {
            return $response;
        }

        return null;
    }

    /**
     * Executes before form validating and processing is started.
     */
    protected function preProcess(FormInterface $form, Request $request): ?Response
    {
        return null;
    }

    /**
     * Executes after preprocessing and before form processing is started.
     */
    protected function validate(FormInterface $form, Request $request): ?Response
    {
        return null;
    }

    /**
     * Executes the form processing.
     */
    abstract protected function process(FormInterface $form, Request $request): bool;

    /**
     * Executes after form processing is finished and filters response.
     */
    protected function postProcess(FormInterface $form, Request $request, Response $response): ?Response
    {
        return $response;
    }
}
