<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\Mailer;

use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Sylius\Component\User\Model\UserInterface;

final class ResetPasswordEmailManager implements ResetPasswordEmailManagerInterface
{
    public function __construct(private SenderInterface $emailSender)
    {
    }

    public function sendResetPasswordEmail(UserInterface $user, ChannelInterface $channel, string $localCode): void
    {
        $this->emailSender->send(
            Emails::PASSWORD_RESET,
            [$user->getEmail()],
            [
                'user' => $user,
                'localeCode' => $localCode,
                'channel' => $channel,
            ],
        );
    }
}
