
                        @foreach ($feedbacks as $key => $feedback)
                        <div class="comment-list mb-2">
                            <div class="comments">
                                <figure class="img-thumbnail">
                                    <img src="{{ url('assets/images/blog/author.jpg') }}" alt="author" width="80"
                                        height="80">
                                </figure>

                                <div class="comment-block">
                                    <div class="comment-header">
                                        <div class="comment-arrow"></div>

                                        <div class="ratings-container float-sm-right">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>

                                        <span class="comment-by">
                                            <strong>{{ $feedback->user->name}}</strong> – {{ $feedback->created_at}}
                                        </span>
                                    </div>

                                    <div class="comment-content">
                                        <p>{{ $feedback->review}}</p>
                                        @php
                                            $email=session()->get("useremail");
                                        @endphp
                                        @if ($feedback->user->email==$email)
                                        <div class="float-sm-right">
                                            <button class="btn btn-danger btn-sm delete del" data-type="feedback" data-del="{{$feedback->id}}"  id="delete">delete</button>
                                        </div>
                                        @endif
                                       
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="reply-section">
                                <button class="btn btn-primary btn-sm reply-btn">Reply</button>
                                <div class="reply-form mt-2" style="display: none;">
                                    <form action="#" class="reply-form2" id="commentForm">
                                        <input type="hidden" name="post" id="post" value="{{ $post_id}}">
                                        <input type="hidden" name="feed" id="feed" value="{{ $feedback->id}}">
                                    <input type="text" name="comment" id="comment" class="form-control" placeholder="Your reply...">
                                    <button class="btn btn-success btn-sm reply-submit-btn reply">Submit Reply</button>
                                    </form>
                                </div>
                            </div>
                            <div id="feeComment">
                                @include('user.comment', [
                                     "comments"=>$feedback->comments,
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
                            .w-5{
                                display: none;
                            }
                            </style>
                        <!-- End .add-product-review -->