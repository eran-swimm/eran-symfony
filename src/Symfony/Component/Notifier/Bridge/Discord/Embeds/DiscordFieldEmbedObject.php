<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Notifier\Bridge\Discord\Embeds;

/**
 * @author Karoly Gossler <connor@connor.hu>
 */
final class DiscordFieldEmbedObject extends AbstractDiscordEmbedObject
{
    /**
     * @return $this
     */
    public function name(string $name): static
    {
        $this->options['name'] = $name;

        return $this;
    }

    /**
     * @return $this
     */
    public function value(string $value): static
    {
        $this->options['value'] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function inline(bool $inline): static
    {
        $this->options['inline'] = $inline;

        return $this;
    }
}
