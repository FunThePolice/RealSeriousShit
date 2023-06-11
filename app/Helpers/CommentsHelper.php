<?php

namespace App\Helpers;

use App\Models\Comment;
use function view;

class CommentsHelper
{
    /**
     * @param Comment $comment
     * @return string
     */
    public static function getCommentReplies(Comment $comment): string
    {
        $depth = 0;
        return implode('', static::getCommentsTree($comment, $depth));
    }

    /**
     * @param Comment $comment
     * @param int $depth
     * @param array $viewCollector
     * @return array
     */
    public static function getCommentsTree(Comment $comment, int &$depth, array &$viewCollector = [], ): array
    {
        $depth++;

        foreach ($comment->replies as $reply) {
            if($reply->replies->isNotEmpty()) {
                static::getCommentsTree($reply, $depth, $viewCollector);
                $depth--;
            }

            array_unshift($viewCollector, static::getReplyViewHtml($reply, $depth));
        }
        return $viewCollector;
    }

    /**
     * @param Comment $reply
     * @param int $depth
     * @return string
     */
    protected static function getReplyViewHtml(Comment $reply, int $depth): string
    {
        return view('partials.comment', ['comment' => $reply, 'depth' => $depth])->render();
    }
}
