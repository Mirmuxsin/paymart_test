<?php

namespace App\Jobs;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->comment = $data;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(Comment $comment)
    {
        sleep(600);
        if (!$comment->create($this->comment)) {
            // when not saved try again
            $this->release();
        }

        return true;
    }
}
