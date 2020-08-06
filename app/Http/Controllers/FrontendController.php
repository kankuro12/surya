<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Gallery;
use App\Services;
use App\Testimonial;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //sliders

    public function sliders()
    {
        return view('back.frontend.slider', ['sliders' => Slider::all()]);
    }

    public function slider_add(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('sliders'), $imageName);
        $slider = new Slider();
        $slider->image = 'sliders/' . $imageName;
        $slider->save();

        return redirect()->back();
    }

    public function slider_del(Slider $slider)
    {
        $slider->delete();
        return redirect()->back();
    }


    //gallery
    public function gallerys()
    {
        return view('back.frontend.gallery', ['images' => Gallery::all()]);
    }

    public function gallery_add(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('sliders'), $imageName);
        $gallery = new Gallery();;
        $gallery->category = $request->category;
        // $gallery->description = $request->description;
        $gallery->image = 'sliders/' . $imageName;
        $gallery->save();

        return redirect()->back();
    }

    public function gallery_del(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->back();
    }

    ///services

    public function services()
    {
        return view('back.frontend.service', ['images' => Services::all()]);
    }

    public function service_add(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('sliders'), $imageName);
        $service = new services();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->image = 'sliders/' . $imageName;
        $service->save();

        return redirect()->back();
    }

    public function service_del(Services $service)
    {
        $service->delete();
        return redirect()->back();
    }

    //testimonial

    public function testimonials()
    {
        return view('back.frontend.testimonial', ['images' => Testimonial::all()]);
    }

    public function testimonial_add(Request $request)
    {


        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->save();

        return redirect()->back();
    }

    public function testimonial_del(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back();
    }
}
