<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'banner';
        parent::__construct();
    }
    public function getList()
    {
        $modelBanner = new Banner();
        $banners = $modelBanner->getList();
        $this->data['list'] = $banners;

        return view('admin/banner/list',$this->data);
    }

    public function getAdd()
    {

        $this->data['menu_active'] = 'banner-add';
        return view('admin/banner/add',$this->data);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                "title"        => "max:50",
                "ordering"     => "numeric",
                "banner_image" =>'required|mimes:jpeg,jpg,png|max:1024'
            ]
        );
        $input = $request->all();
        $modelBanner = new Banner();
        $input['image'] = null;
        if ($request->hasFile('banner_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('banner_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('banner_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('banner_image')->storeAs('public/banner_images', $filenametostore);
            $request->file('banner_image')->storeAs('public/banner_images/thumbnail', $filenametostore);
            $input['image'] = 'storage/banner_images/thumbnail/' . $filenametostore;
            //Resize image here
            $thumbnailpath = ('storage/banner_images/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(1000, 750, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($thumbnailpath);

        }

        $modelBanner->insertBanner($input);
        return redirect(route('list_banner'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $id = (int)$request->input('id');
        $modelBanner = new Banner();
        $banner = Banner::find($id);
        if(!$banner){
            return response()->json(['error' => 1, 'message' => 'Banner không tồn tại']);
        }
        $modelBanner->deleteBanner($id);
        return response()->json(['error' => 0, 'message' => 'Xóa banner thành công']);
    }


    public function getEdit($id){
        $modelBanner = new Banner();
        $banner = Banner::find($id);
        if(!$banner){
            return abort(404);
        }
        $this->data['banner'] = $banner;

        return view('admin/banner/edit',$this->data);
    }

    public function postEdit(Request $request, $id){
        $modelBanner = new Banner();
        $banner = Banner::find($id);
        if(!$banner){
            return abort(404);
        }
        $this->validate($request,
            [
                "title"        => "max:50",
                "ordering"     => "numeric",
                "banner_image" =>'required|mimes:jpeg,jpg,png|max:1024'
            ]
        );
        $input = $request->all();
      
        $input['image'] = $input['banner_image_old'];
        if ($request->hasFile('banner_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('banner_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('banner_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('banner_image')->storeAs('public/banner_images', $filenametostore);
            $request->file('banner_image')->storeAs('public/banner_images/thumbnail', $filenametostore);
            $input['image'] = 'storage/banner_images/thumbnail/' . $filenametostore;
            //Resize image here
            $thumbnailpath = ('storage/banner_images/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(1000, 750, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($thumbnailpath);

        }

        $modelBanner->updateBanner($banner, $input);
        return redirect(route('list_banner'));
    }

}