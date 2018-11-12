<?php

namespace App\Http\Controllers;
use App\Faq;
use App\Inbox;
use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Membership;
use App\Notifications\AccountActiveSuccess;
use App\Page;
use App\Profile;
use App\Settings;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SocialAuth;
use App\Deposit;
use App\Post;
use App\Withdraw;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache as Cache;

class GuestController extends Controller
{

    public function index()
    {
        $deposits = Cache::remember('deposits', 30, function() {
            return Deposit::orderBy('created_at','desc')->take(10)->get();
        });

        $withdraws = Cache::remember('withdraws', 30, function() {
            return Withdraw::orderBy('created_at','desc')->take(10)->get();
        });

        $testimonials = Cache::remember('testimonials', 30, function() {
            return Testimonial::inRandomOrder()->take(3)->get();
        });

        return view('index',compact(
            'deposits',
            'withdraws',
            'testimonials'
            )
        );
    }


    public function aboutMe()
    {
        return view('about');
    }

    public function EmailContact(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|min:5|max:200',
            'subject'   => 'required|min:10|max:200',
            'email'     => 'required|email',
            'body'      => 'required|min:200|max:3000',
        ]);

        $inbox = new Inbox();
        $inbox->name = $request->name;
        $inbox->email = $request->email;
        $inbox->subject = $request->subject;
        $inbox->details = $request->body;
        $inbox->status = 0;
        $inbox->save();

        session()->flash('message', 'Your Message Has Been Successfully Send to Support Agent.');
        Session::flash('type', 'success');
        Session::flash('title', 'Send Successful');

        return redirect()->back();

    }

    public function auth($provider)
    {
        return  SocialAuth::authorize($provider);
    }

    public function auth_callback($provider)
    {
        SocialAuth::login($provider, function ($user, $details) {

            $membership = Membership::first();
            $user->name = $details->full_name;
            $user->email = $details->email;
            $user->active = 1;
            $user->membership_id = $membership->id;
            $user->membership_started = Carbon::today();
            $today = Carbon::today();
            $user->membership_expired = $today->addDays($membership->duration);
            $user->save();

        });
        session()->flash('message', 'Your Profile Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');
        return redirect()->route('userDashboard');
    }



    public function contact()
    {
        $faqs = Faq::all();
        return view('contact',compact('faqs'));
    }

    public function services()
    {
        return view('services');
    }


    public function tutorials()
    {
        $posts = Post::latest()->paginate(10);
        $user = User::whereAdmin(1)->first();
        $pages = Page::all();

        return view('blog',compact('posts','user', 'pages'));
    }

    public function verifyLogout()
    {
        session()->flash('message', 'Your account has been successfully created but not active yet. You have to active your account for use our service. Please check your email for verify code.');
        Auth::logout();
        return redirect()->route('login');
    }

    public function proof()
    {
        $withdraws = Withdraw::orderBy('created_at','desc')->paginate(30);
        return view('proof',compact('withdraws'));
    }

    public function verify($token)
    {
        $user = User::where('token',$token)->firstOrfail();

        $user->token = null;
        $user->active = 1;
        $user->save();

        $user->notify(new AccountActiveSuccess($user));

        session()->flash('message', 'Your Email Address Has Been Successfully Verified.');
        Session::flash('type', 'success');
        Session::flash('title', 'Verified Successful');

        return redirect()->route('userDashboard');
    }


    public function tutorialView($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $user = User::whereAdmin(1)->first();
        return view('blogview', compact('post','user'));
    }

    public function pageView($slug)
    {
        $page = Cache::remember('page_' . $slug, 30, function() use ($slug) {
            return Page::where('slug', $slug)->firstOrFail();
        });

        return view('singlepage',compact(
            'page'
        ));
    }

}
