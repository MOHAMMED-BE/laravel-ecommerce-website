<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request)
    {

        $product_id = $request->product_id ;

        Review::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'summary' => $request->summary,
            'rating' => $request->quality,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Review Will Be Approve By Admin',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end ReviewStore

    public function PendingReview()
    {
        $reviews = Review::where('status',0)->orderBy('id','desc')->get();

        return view('backend.review.pending-review',compact('reviews'));
    } // end PendingReview

    public function PublishReview()
    {
        $reviews = Review::where('status',1)->orderBy('id','desc')->get();

        return view('backend.review.publish-review',compact('reviews'));
    } // end PublishReview

    public function ReviewApprove($id)
    {
        Review::where('id',$id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('publish.review')->with($notification);

    } // end ReviewApprove

    public function ReviewDelete($id)
    {
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end ReviewDelete
} 
