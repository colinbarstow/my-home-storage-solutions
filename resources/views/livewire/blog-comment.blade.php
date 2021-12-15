<div>
    <div class="comments mb-8">
        <h3 class="title title-simple text-left text-normal mb-6">{{ $this->count }} Comments</h3>
        <ul>
            @foreach($this->comments as $comment)
                <li>
                    <div class="comment">
                        <div class="comment-body">
                            <div class="comment-user">
                                <h4><a href="#">{{ $comment->name() }}</a></h4>
                                <span class="comment-date">{{ $comment->date() }}</span>
                            </div>

                            <div class="comment-content">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @if(!$complete)
    <div class="reply">
        <div class="title-wrapper text-left">
            <h3 class="title title-simple text-left text-normal">Leave A Reply</h3>
            <p>Your email address will not be published. Required fields are marked *</p>
        </div>
        @auth
            <form wire:submit.prevent="submitAuth">
                <textarea id="reply-message" cols="30" rows="4" class="form-control mb-4" placeholder="Comment *" wire:model="comment"></textarea>
                <button type="submit" class="btn btn-primary btn-md">POST COMMENT<i class="d-icon-arrow-right"></i>
                </button>
            </form>
        @endauth
        @guest
            <form wire:submit.prevent="submit">
                <textarea id="reply-message" cols="30" rows="4" class="form-control mb-4" placeholder="Comment *" wire:model="comment"></textarea>
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <input type="text" wire:model="name" class="form-control" id="reply-name" name="reply-name" placeholder="Name *" />
                    </div>
                    <div class="col-md-6 mb-5">
                        <input type="email" wire:model="email" class="form-control" id="reply-email" name="reply-email" placeholder="Email" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md">POST COMMENT<i class="d-icon-arrow-right"></i>
                </button>
            </form>
        @endguest
    </div>
    @else
    <div class="reply">
        <div class="title-wrapper text-left">
            <h3 class="title title-simple text-left text-normal">Thank you</h3>
            <p>Thank you for your comment</p>
        </div>
    </div>
    @endif
</div>
