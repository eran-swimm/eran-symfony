<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Zulip\Tests;

use Symfony\Component\Notifier\Bridge\Zulip\ZulipTransport;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Message\MessageInterface;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\Test\TransportTestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ZulipTransportTest extends TransportTestCase
{
    public function createTransport(HttpClientInterface $client = null): ZulipTransport
    {
        return (new ZulipTransport('testEmail', 'testToken', 'testChannel', $client ?? $this->createMock(HttpClientInterface::class)))->setHost('test.host');
    }

    public function toStringProvider(): iterable
    {
        yield ['zulip://test.host?channel=testChannel', $this->createTransport()];
    }

    public function supportedMessagesProvider(): iterable
    {
        yield [new ChatMessage('Hello!')];
    }

    public function unsupportedMessagesProvider(): iterable
    {
        yield [new SmsMessage('0611223344', 'Hello!')];
        yield [$this->createMock(MessageInterface::class)];
    }
}
