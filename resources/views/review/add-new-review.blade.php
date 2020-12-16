<!-- Button trigger modal -->
<button type="button" class="btn btn-link font-weight-bold" data-toggle="modal" data-target="#exampleModal">
    Add New Review
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @guest
                <div class="modal-body">
                    <h5 class="text-center pt-5 pb-5">You have to be logged in to add a review</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            @else
                <form action="/service-provider/review" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="{{ $profile->profile_user_id }}" name="review_provider_id" />
                        <div class="form-group">
                            <label for="Rating">Rating</label>
                            <select class="form-control" id="Rating" name="review_rating">
                                @for($i=5; $i>=1; $i--)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Review">Review</label>
                            <textarea id="Review" class="form-control" name="review"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add new review</button>
                    </div>
                </form>
            @endguest
        </div>
    </div>
</div>
