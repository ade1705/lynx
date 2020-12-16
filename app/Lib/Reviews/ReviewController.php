<?php
namespace App\Lib\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * @var ReviewRepository
     */
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->middleware('auth', ['except' => ['getReviews']]);
    }

    /**
     * @param Request $request
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, Review $review)
    {
        $review->review_provider_id = $request->review_provider_id;
        $review->review_rating = $request->review_rating;
        $review->review = $request->review;
        $review->review_user_id = Auth::id();
        $this->reviewRepository->save($review);
        return redirect()->back()->with('success', 'Thanks for the review!');
    }

    public function getReviews()
    {

    }
}
