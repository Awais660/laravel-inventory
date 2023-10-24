@foreach ($feedbacks as $key => $feedback)
    <div class="comment-list mb-2">
        <div class="comments">
            <figure class="img-thumbnail">
                <img src="{{ url('assets/images/blog/author.jpg') }}" alt="author" width="80" height="80">
            </figure>

            <div class="comment-block">
                <div class="comment-header">
                    <div class="comment-arrow"></div>

                    <div class="ratings-container float-sm-right">
                        <div class="product-ratings">
                            @php
                                $width = 0;
                                if ($feedback->rating == '5') {
                                    $width = 100;
                                } elseif ($feedback->rating == '4') {
                                    $width = 80;
                                }elseif ($feedback->rating == '3') {
                                    $width = 60;
                                }elseif ($feedback->rating == '2') {
                                    $width = 40;
                                }else{
                                    $width = 20;
                                }
                            @endphp
                            <span class="ratings" style="width: {{ $width }}%;"></span>
                            <!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <!-- End .product-ratings -->
                    </div>

                    <span class="comment-by">
                        <strong>{{ $feedback->user->name }}</strong> – {{ $feedback->created_at }}
                    </span>
                </div>

                <div class="comment-content">
                    <p>{{ $feedback->review }}</p>
                    @php
                        $email = session()->get('useremail');
                    @endphp
                    @if ($feedback->user->email == $email)
                        <div class="float-sm-right">
                            <button class="btn btn-danger btn-sm delete del" data-type="feedback"
                                data-del="{{ $feedback->id }}" id="delete"
                                onclick="deleteFeedback({{ $feedback->id }})">Delete</button>
                        </div>
                    @endif

                </div>

            </div>
        </div>

        @if ($permissions->comment=="1")
        <div class="reply-section">
            <button class="btn btn-primary btn-sm reply-btn" onclick="toggleReplyForm(this)">Reply</button>
            <div class="reply-form mt-2" style="display: none;">
                <form action="#" class="reply-form2" id="commentForm">
                    <input type="hidden" name="post" id="post" value="{{ $post_id }}">
                    <input type="hidden" name="feed" id="feed" value="{{ $feedback->id }}">
                    <input type="text" name="comment"  class="form-control"
                        placeholder="Your reply...">
                        <b><span id="comment" style="color:red"></span></b>
                        <br>
                    <button class="btn btn-success btn-sm reply-submit-btn reply"
                        onclick="submitReply(event, '{{ url('comment') }}', '{{ csrf_token() }}')">Submit
                        Reply</button>
                </form>
            </div>
        </div>
        @endif
        <div id="feeComment">
            @include('user.comment', [
                'comments' => $feedback->comments,
                'feedback_id' => $feedback->pid,
            ])
        </div>
    </div>
    </div>
@endforeach
<div class="row">
    {{ $feedbacks->links() }}
</div>

<style>
    .w-5 {
        display: none;
    }
</style>
<!-- End .add-product-review -->
