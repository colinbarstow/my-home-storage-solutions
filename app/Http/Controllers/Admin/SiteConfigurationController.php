<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SiteConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        $configuration = SiteConfiguration::find(1);
        $lastSegment = collect(request()->segments())->last();
        return view('pages.site-configurations.overview', compact('configuration', 'lastSegment'));
    }

    public function settings()
    {
        $configuration = SiteConfiguration::find(1);
        $lastSegment = collect(request()->segments())->last();
        return view('pages.site-configurations.settings', compact('configuration', 'lastSegment'));
    }

    public function branding()
    {
        $configuration = SiteConfiguration::find(1);
        $lastSegment = collect(request()->segments())->last();

        return view('pages.site-configurations.branding', compact('configuration', 'lastSegment'));
    }

    public function brandingUpdate(Request $request, SiteConfiguration $configuration)
    {
        if(isset($request->profile_avatar)){
            $logo = $request->file('profile_avatar')
                ->storeAs('public/logos', strtolower(Str::slug($request->website_name)) . '.' .$request->profile_avatar->getClientOriginalExtension());
        } else {
            $logo = $configuration->logo;
        }
        $configuration->update([
            'website_name' => Str::title($request->website_name),
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'logo' => $logo
        ]);

        activity()
            ->performedOn($configuration)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Site branding updated'])
            ->log('Site branding updated');

        Artisan::call('cache:clear');
        Artisan::call('config:cache');

        flash('Your branding been updated successfully', 'success');


        return redirect()->route('admin.site-configurations.branding');
    }

    public function contactInformation()
    {
        $configuration = SiteConfiguration::find(1);
        $lastSegment = collect(request()->segments())->last();
        return view('pages.site-configurations.contact-information', compact('configuration', 'lastSegment'));
    }

    public function contactInformationUpdate(Request $request, SiteConfiguration $configuration)
    {
        $configuration->update([
            'contact_email' => $request->contact_email,
            'contact_form_email' => $request->contact_form_email,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
        ]);

        activity()
            ->performedOn($configuration)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Site contact information updated'])
            ->log('Site contact information updated');

        Artisan::call('cache:clear');
        Artisan::call('config:cache');

        flash('Your contact information has been updated successfully', 'success');


        return redirect()->route('admin.site-configurations.contact-information');
    }

    public function settingsUpdate(Request $request, SiteConfiguration $configuration)
    {
        $configuration->update([
            'deposit' => $request->deposit,
            'measurement' => $request->measurement,
            'show_banner' => $this->trueOrFalse($request, 'show_banner'),
            'banner_message' => $request->banner_message,
        ]);

        activity()
            ->performedOn($configuration)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Site configuration settings updated'])
            ->log('Site configuration settings updated');

        Artisan::call('cache:clear');
        Artisan::call('config:cache');

        flash('Your settings have been updated successfully', 'success');

        return redirect()->route('admin.site-configurations.settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteConfiguration  $siteConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteConfiguration $siteConfiguration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteConfiguration  $siteConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteConfiguration $siteConfiguration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteConfiguration  $siteConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteConfiguration $siteConfiguration)
    {
        //
    }
}
