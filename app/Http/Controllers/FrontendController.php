<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Contact;
use App\Models\Notice;
use App\Models\About;
use App\Models\Event;
use App\Models\Carosel;
use Carbon\Carbon;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->take(3)->get();
    
        $notices = Notice::orderBy('id', 'desc')->take(3)->get();
        $carosel = Carosel::latest()->first();
        foreach ($notices as $notice) {
            $notice->formatted_date = Carbon::parse($notice->created_at)->format('M j, Y');
        }
        foreach ($events as $event) {
            $event->formatted_date = Carbon::parse($event->created_at)->format('M j, Y');
        }


        $about = About::orderBy('id', 'desc')->first();
        return view('frontend.index', compact('events', 'notices', 'about','carosel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.registerMember.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */


    public function registerMember()
    {
        return view('frontend.registerMember.create');
    }

    public function storeMember(Request $request)
    {
        dd($request);
    }

    public function about()
    {
        $about = About::orderBy('id', 'desc')->first();
        return view('frontend.components.about', compact('about'));
    }
    public function events()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('frontend.components.events', compact('events'));
    }

    public function event_show($id)
    {
        $event = Event::find($id);
        // $event->formatted_date = Carbon::parse($event->created_at)->format('M j, Y');
        return view('frontend.components.event_show', compact('event'));
    }

    public function notice_show($id)
    {
        $notice = Notice::find($id);
        return view('frontend.components.notice_show', compact('notice'));
    }

    public function notices()
    {
        $notices = Notice::all();
        return view('frontend.components.notices', compact('notices'));
    }

    public function details($id)
    {
        $member = Member::find($id);
        return view('frontend.registerMember.details', compact('member'));
    }
    
}
