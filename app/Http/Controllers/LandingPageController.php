<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;
use App\Models\Product;
use App\Models\LandingPageProduct;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{

    public function index(){
        $landing_pages = LandingPage::orderBy('created_at', 'desc')->get();
        return view('backend.marketing.landing_pages.index',compact('landing_pages'));
    }

    public function create(){
        return view('backend.marketing.landing_pages.create');
    }

    public function edit($id){
        $landing_page=LandingPage::findOrFail($id);
        return view('backend.marketing.landing_pages.edit',compact('landing_page'));
    }

    public function store(Request $request){
        $landindPage = new LandingPage;
        $landindPage->name = $request-> name;
        $landindPage->title_1 = $request->title;
        $landindPage->image_1 = $request->banner_image;
        $landindPage->phone = $request->phone;
        $landindPage->description = $request->description;
        $landindPage->description_2 = $request->description_2;
        $landindPage->description_3 = $request->description_3;
        $landindPage->title_2 = $request->title_2;
        $landindPage->image_2 = $request->image_2;
        $landindPage->title_3 = $request->title_3;
        $landindPage->image_3 = $request->image_3;
        $landindPage->video1_title = $request->video_title_1;
        $landindPage->video1_link = $request->video_1_link;
        $landindPage->video2_title = $request->video_title_2;
        $landindPage->video2_link = $request->video_2_link;
        $landindPage->slide_image_1	 = $request->slider_1;
        $landindPage->slide_image_2	 = $request->slider_2;
        $landindPage->slide_image_3	 = $request->slider_3;
        $landindPage->top_video	 = $request->top_video_link;
        $landindPage->save();
        // dd($request);
        // flash(translate('Flash Deal has been inserted successfully'))->success();
        // return redirect()->route('landing_page.index');
        if($landindPage->save()){
            foreach ($request->products as $key => $product) {
                $landing_page_product = new LandingPageProduct;
                $landing_page_product->landing_page_id = $landindPage->id;
                $landing_page_product->product_id = $product;
                $landing_page_product->save();
            }

            flash(translate('Landing Page has been inserted successfully'))->success();
            return redirect()->route('landing_page.index');
        }else{
            flash(translate('Something went wrong'))->error();
            return back();
        }

    }

    public function update(Request $request){
        $landindPage = LandingPage::findOrFail($request->id);
        $landindPage->name = $request-> name;
        $landindPage->title_1 = $request->title;
        $landindPage->image_1 = $request->banner_image;
        $landindPage->phone = $request->phone;
        $landindPage->description = $request->description;
        $landindPage->description_2 = $request->description_2;
        $landindPage->description_3 = $request->description_3;
        $landindPage->title_2 = $request->title_2;
        $landindPage->image_2 = $request->image_2;
        $landindPage->title_3 = $request->title_3;
        $landindPage->image_3 = $request->image_3;
        $landindPage->video1_title = $request->video_title_1;
        $landindPage->video1_link = $request->video_1_link;
        $landindPage->video2_title = $request->video_title_2;
        $landindPage->video2_link = $request->video_2_link;
        $landindPage->slide_image_1	 = $request->slider_1;
        $landindPage->slide_image_2	 = $request->slider_2;
        $landindPage->slide_image_3	 = $request->slider_3;
        $landindPage->top_video	 = $request->top_video_link;
        $landindPage->save();
        // dd($request);
        // flash(translate('Flash Deal has been inserted successfully'))->success();
        // return redirect()->route('landing_page.index');
        foreach ($landindPage->landing_page_products as $key => $landing_page_product) {
            $landing_page_product->delete();
        }
        if($landindPage->save()){
            foreach ($request->products as $key => $product) {
                $landing_page_product = new LandingPageProduct;
                $landing_page_product->landing_page_id = $landindPage->id;
                $landing_page_product->product_id = $product;
                $landing_page_product->save();
            }
            flash(translate('Landing Page has been updated successfully'))->success();
            return redirect()->route('landing_page.index');
        }else{
            flash(translate('Something went wrong'))->error();
            return back();
        }

    }

    public function update_status(Request $request){
        $landing_page = LandingPage::findOrFail($request->id);
        $landing_page->status = $request->status;
        if($landing_page->save()){
            flash(translate('Landing page status updated successfully'))->success();
            return 1;
        }
        return 0;
    }

    public function destroy($id){
        $landinPage=LandingPage::findOrFail($id);
        $landinPage->landing_page_products()->delete();
        LandingPage::destroy($id);
        flash(translate('Landing page has been deleted successfully'))->success();
        return redirect()->route('landing_page.index');
    }
}