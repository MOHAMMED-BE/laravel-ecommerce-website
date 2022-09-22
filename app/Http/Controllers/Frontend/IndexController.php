<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Review;

class IndexController extends Controller
{
    public function Index(){
        $categories = Category::orderBy('category_name_en','asc')->get();
        $sliders = Slider::where('status',1)->orderBy('id','asc')->limit(3)->get();                            
        $products  = Product::where('status',1)->orderBy('id','desc')->limit(7)->get();  
        // $products_tags_en  = Product::where('status',1)->groupBy('product_tags_en')->select('product_tags_en')->get();
        // $products_tags_ar  = Product::where('status',1)->groupBy('product_tags_ar')->select('product_tags_ar')->get();
        $featureds = Product::where('featured',1)->orderBy('id','desc')->limit(5)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','desc')->limit(5)->get();
        // $hot_deals = Product::where('hot_deals',1)->orderBy('id','desc')->limit(5)->get();
        $special_offers = Product::where('special_offer',1)->orderBy('id','desc')->limit(5)->get();
        $special_deals  = Product::where('special_deals',1)->orderBy('id','desc')->limit(5)->get();

        $skip_category = Category::skip(1)->first();
        $skip_brand = Brand::skip(0)->first();
        $skip_product  = Product::where('status',1)->where('category_id',$skip_category->id)->orderBy('id','desc')->get(); 
        $skip_product_brand  = Product::where('status',1)->where('brand_id',$skip_brand->id)->orderBy('id','desc')->get(); 

        $blogpost = BlogPost::latest()->get();


        // return $skip_category->id;
        // die();

        return view('frontend.index',compact('sliders','categories','products','featureds','hot_deals','special_offers','special_deals','skip_category','skip_product','skip_brand','skip_product_brand','blogpost'));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user-profile',compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $storeData = User::find(Auth::user()->id);
        $storeData->name = $request->name;
        $storeData->email = $request->email;
        $storeData->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user-images/' . $storeData->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user-images'), $filename);
            $storeData['profile_photo_path'] = $filename;
        }

        $storeData->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    } // end UserProfileStore

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user-change-password',compact('user'));
    } // UserChangePassword

    public function UserUpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed',
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'User Password Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('user.logout')->with($notification);;
        }
        else{
            return redirect()->back();
        }
    } // UserUpdateChangePassword

    public function ProductDetails($id,$product_slug)
    {
        $product = Product::findOrFail($id);
        $multi_img = MultiImg::where('product_id',$id)->get();  
        $related_products = Product::where('category_id',$product->category_id)->where('id','!=',$id)->get(); 
        $reviews = Review::where('product_id',$product->id)->where('status',1)->get();

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',',$size_ar);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',',$color_ar);

        return view('frontend.product.product-details',compact('product','multi_img','product_size_en','product_size_ar','product_color_en','product_color_ar','related_products','reviews'));
    } // end ProductDetails

    public function TagWiseProduct($tag)
    {
        $products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','desc')->paginate(6); 
        // $products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','desc')->get(); 
        // $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_ar',$tag)->orderBy('id','desc')->get(); 
        $categories = Category::orderBy('category_name_en','asc')->get();
        
        return view('frontend.tags.tags-view',compact('products','categories'));
        
    } // end TagWiseProduct

    public function SubCategoryWiseProduct($subcat_id,$subcategory_slug)
    {
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','desc')->paginate(6); 
        $categories = Category::orderBy('category_name_en','asc')->get();
        
        return view('frontend.product.subcategory-view',compact('products','categories'));
    } // end SubCategoryProduct

    public function SubSubCategoryWiseProduct($subsubcat_id,$subcategory_slug,$subsubcategory_slug)
    {
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','desc')->paginate(6); 
        $categories = Category::orderBy('category_name_en','asc')->get();
        
        return view('frontend.product.sub-subcategory-view',compact('products','categories'));
    } // end SubCategoryProduct

    public function ProductViewAjax($id)
    {
        $product = Product::with('category','brand')->findOrFail($id);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',',$size_ar);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',',$color_ar);

        return response()->json(array(
            'product' => $product,
            'product_size_en' => $product_size_en,
            'product_color_en' => $product_color_en,
        ));
    } // end ProductViewAjax

}


