<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

use App\Models\Comment;
use App\Models\Reply;
use App\Models\Subscriber;



class HomeController extends Controller
{


    public function index()
    {
        $product = Product::paginate(10);
        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }
            $total_delivered = order::where('delivery_status', '=', 'Teslim edildi')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'İşlemde')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        } else {
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        }
    }
    public function product_details($id)
    {
        $product = product::find($id);
        $comment = comment::orderby('id', 'desc')->get();
        $reply = reply::all();
        return view('home.product_details', compact('product', 'comment', 'reply'));
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $product = product::find($id);

            $product_exist_id = cart::where('Product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

            if ($product_exist_id) {
                $cart = cart::find($product_exist_id)->first();

                $quantity = $cart->quantity;

                $cart->quantity = $quantity + $request->quantity;

                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price *  $cart->quantity;
                } else {
                    $cart->price = $product->price *  $cart->quantity;
                }
                $cart->save();
                return redirect('show_cart')->with('message', 'Ürün Sepetine Eklendi');
            } else {

                $cart = new cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->Product_title = $product->title;

                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }
                $cart->image = $product->image;
                $cart->Product_id = $product->id;
                $cart->quantity = $request->quantity;

                $cart->save();
                return redirect('show_cart')->with('message', 'Ürün Sepetine Eklendi');
            }
        } else {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart(Request $request, $id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_order()
    {

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $cartCount = cart::where('user_id', '=', $userid)->count();

            if ($cartCount > 0) {
                $data = cart::where('user_id', '=', $userid)->get();
                foreach ($data as $data) {
                    $order = new order;
                    $order->name = $data->name;
                    $order->email = $data->email;
                    $order->phone = $data->phone;
                    $order->address = $data->address;
                    $order->user_id = $data->user_id;
                    $order->product_title = $data->product_title;
                    $order->price = $data->price;
                    $order->quantity = $data->quantity;
                    $order->image = $data->image;
                    $order->product_id = $data->Product_id;
                    $order->payment_status = 'Kapıda Ödeme';
                    $order->delivery_status = 'İşlemde';
                    $order->save();
                    $cart_id = $data->id;
                    $cart = cart::find($cart_id);
                    $cart->delete();
                }
                return redirect()->back()->with('message', 'Siparişiniz Alındı.Sizinle iletişime geçeceğiz..');
            } else {
                return redirect()->back()->with('message', 'Sepetiniz boş olduğu için sipariş alınamıyor.');
            }
        } else {
            return redirect('login');
        }
    }
    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }
    public function stripePost(Request $request, $totalprice)
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->count();
        if ($data > 0) {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create([
                "amount" => $totalprice * 100,
                "currency" => "try",
                "source" => $request->stripeToken,
                "description" => "Ödeme için teşekkürler."
            ]);

            // Process the payment and create orders only if the cart is not empty
            $cartItems = cart::where('user_id', '=', $userid)->get();

            foreach ($cartItems as $cartItem) {
                $order = new order;
                $order->name = $cartItem->name;
                $order->email = $cartItem->email;
                $order->phone = $cartItem->phone;
                $order->address = $cartItem->address;
                $order->user_id = $cartItem->user_id;
                $order->product_title = $cartItem->product_title;
                $order->price = $cartItem->price;
                $order->quantity = $cartItem->quantity;
                $order->image = $cartItem->image;
                $order->product_id = $cartItem->Product_id;
                $order->payment_status = 'Ödendi';
                $order->delivery_status = 'İşlemde';
                $order->save();

                $cartItem->delete();
            }

            Session::flash('success', 'Ödeme Başarılı!');

            return back();
        }
        else {
            return redirect()->back()->with('message', 'Sepetiniz boş olduğu için ödeme yapılamıyor.');
        }
    }

    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $order = order::where('user_id', '=', $userid)->get();
            return view('home.order', compact('order'));
        } else {
            return redirect('login');
        }
    }
    public function cancel_order($id)
    {
        $order = order::find($id);
        $order->delivery_status = 'Siparişi İptal Ettiniz.';
        $order->save();
        return redirect()->back();
    }
    public function add_comment(Request $request)
    {
        if (Auth::id()) {
            $comment = new comment;

            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;

            $comment->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function add_reply(Request $request)
    {
        if (Auth::id()) {
            $reply = new reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function product_search(Request $request)
    {

        $search_text = $request->search;
        $product = product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->paginate(10);
        return view('home.userpage', compact('product'));
    }
    public function products()
    {
        $product = Product::paginate(10);
        return view('home.all_product', compact('product'));
    }
    public function search_product(Request $request)
    {

        $search_text = $request->search;
        $product = product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->paginate(10);
        return view('home.all_product', compact('product'));
    }
    public function show_client()
    {

        return view('home.show_client');
    }
    public function show_us()
    {

        return view('home.show_us');
    }




    public function subscribe(Request $request)
    {

        $email = $request->input('email');
        if (Auth::id()) {
            $subscriber = new subscriber;

            $subscriber->email = Auth::user()->email;

            $subscriber->save();
        return redirect()->back()->with('message', 'Başarıyla Abone Oldunuz.');

        } else {
            return redirect('login');
        }


    

    }


}
