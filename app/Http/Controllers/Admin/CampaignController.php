<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendCampaign;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\MarketingList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::orderBy('scheduled', 'desc')->get();
        $page_title = 'Blog Post Campaigns';
        $page_description = 'From here you can view and manage your existing Blog Post campaigns.';

        return view('pages.campaigns.index', compact('page_title', 'page_description', 'campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
        $page_title = 'New Blog Campaign';
        $page_description = 'Use the form below to create a new Blog Post Campaign';

        return view('pages.campaigns.create', compact('page_title', 'page_description', 'blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $marketings = MarketingList::all()->pluck('id')->toArray();
        $campaign = Campaign::create([
            'blog_id' => $blog->id,
            'subject' => $request->subject,
            'body' => $request->blog_content,
            'total_users' => 0,
            'scheduled' => Carbon::parse($request->scheduled)->format('Y-m-d H:i:s'),
            'posted' => 0
        ]);

        $campaign->marketingLists()->sync($marketings);

        $campaign->update([
            'total_users' => $campaign->marketingLists->count()
        ]);

        if($this->campaignNeedsToPost($campaign)) $this->postCampaign($campaign);


        activity()
            ->performedOn($campaign)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Campaign Created'])
            ->log('New Campaign created');


        flash('Your Campaign was successfully created');

        return redirect()->route('admin.campaigns.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $page_title = 'Edit Campaign';
        $page_description = 'Use the form below to edit your Blog Post campaign';

        return view('pages.campaigns.edit', compact('page_title', 'page_description', 'campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $campaign->update([
            'subject' => $request->subject,
            'body' => $request->blog_content,
            'total_users' => 0,
            'scheduled' => Carbon::parse($request->scheduled)->format('Y-m-d H:i:s'),
        ]);

        if($this->campaignNeedsToPost($campaign)) $this->postCampaign($campaign);

        activity()
            ->performedOn($campaign)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Campaign Updated'])
            ->log('Campaign updated');


        flash('Your campaign was successfully updated');

        return redirect()->route('admin.campaigns.index');
    }

    private function campaignNeedsToPost($campaign)
    {
        if(Carbon::now() >= $campaign->scheduled) return true;
        return false;
    }

    private function postCampaign($campaign)
    {
        $campaign->posted = 1;
        $campaign->save();
        event(new SendCampaign($campaign));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        activity()
            ->performedOn($campaign)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Campaign Deleted'])
            ->log('Campaign deleted');

        flash('The Campaign has been successfully deleted');

        return back();
    }

    /**
     * @param Request $request
     */
    public function uploadImagesFromCKEditor(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->storeAs('public/campaigns/ckeditor', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url('public/campaigns/ckeditor/'. $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
