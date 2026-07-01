<?php

/*
 * This file is part of fof/formatting.
 *
 * Copyright (c) FriendsOfFlarum.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zephyrisle\FormattingPro\Api;

use Flarum\Api\Context;
use Flarum\Api\Schema;

class ForumResourceFields
{
    const PLUGINS = [
        'AutoAudio',
        'NetEase',
        'Bilibili',
    ];

    public function __invoke(): array
    {
        return [
            Schema\Arr::make('zephyrisle-formatting-pro-fork.plugins')
                ->visible(fn (object $model, Context $context) => $context->getActor()->isAdmin())
                ->get(function (object $model, Context $context) {
                    return self::PLUGINS;
                }),
            Schema\Str::make('zephyrisle-formatting-pro-fork.audio_css')
                ->visible(fn (object $model, Context $context) => $context->getActor()->isAdmin())
                ->get(function (object $model, Context $context) {
                    return resolve('flarum.settings')->get('zephyrisle-formatting-pro-fork.audio_css', '');
                }),
        ];
    }
}
