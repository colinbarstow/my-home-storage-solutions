<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Models\ProductCategory;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Team Member';
        $page_description = 'Use the form below to create a new Team member';

        return view('pages.team-members.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $img = Image::make($request->file('image'))->encode($request->image->getClientOriginalExtension());

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $fileName = Str::slug(strtolower($request->name)).'.' .$request->image->getClientOriginalExtension();


        $thumb = clone   $img;
        $thumb->resize(280, 280, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumb->stream();

        Storage::put($this->getUploadPath($fileName), $thumb);

        $teamMember = Team::create([
            'name' => $request->name,
            'job'  => $request->job,
            'image' => $this->getUploadPath($fileName),
        ]);

        activity()
            ->performedOn($teamMember)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Team Member Created'])
            ->log('New Team Member created');


        return redirect()->route('admin.about-page');
    }

    public function  getUploadPath($filename){
        return 'public/team-members/' . $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $page_title = 'Edit Team Member';
        $page_description = 'Use the form below to edit a new Team member';

        return view('pages.team-members.edit', compact('page_title', 'page_description', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        if(isset($request->image)){
            $img = Image::make($request->file('image'))->encode($request->image->getClientOriginalExtension());

            $img->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $fileName = Str::slug(strtolower($request->name)).'.' .$request->image->getClientOriginalExtension();


            $thumb = clone   $img;
            $thumb->resize(280, 280, function ($constraint) {
                $constraint->aspectRatio();
            });

            $thumb->stream();

            Storage::put($this->getUploadPath($fileName), $thumb);

            $image = $this->getUploadPath($fileName);

        } else {

            $image = $team->image;

        }


        $team->update([
            'name' => $request->name,
            'job'  => $request->job,
            'image' => $image,
        ]);

        activity()
            ->performedOn($team)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Team Member Updated'])
            ->log('New Team Member updated');


        return redirect()->route('admin.about-page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->back();
    }
}
