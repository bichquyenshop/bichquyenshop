<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\View;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $this->data['menu_active'] = 'setting';
        parent::__construct();
    }

    public function getEdit(){
        $modelSetting = new Setting();
        $setting = $modelSetting->getSetting();
        $modelView = new View();
        if(empty($setting)){
            $modelSetting->insertSetting(['logo' => '', 'email' => '', 'address' => '', 'tel' => '', 'link_fb' => '', 'link_ins' => '', 'link_youtube' => '', 'description' => '']);
            $setting = $modelSetting->getSetting();
        }

        $this->data['setting'] = $setting;
        $this->data['count_view'] = $modelView->count();
        $this->data['count_daily_view'] = $modelView->countByDate(date('Y-m-d'));

        return view('admin/setting/edit',$this->data);
    }

    public function postEdit(Request $request){
        $this->validate($request,
            [
                "address"    => "sometimes|nullable|max:150",
                "logo_image" =>'sometimes|nullable|mimes:jpeg,jpg,png|max:2048',
                "tel" => "sometimes|nullable|numeric|digits:10",
                "email" => "sometimes|nullable|email|max:100"
            ]
        );

        $input = $request->all();

        $modelSetting = new Setting();
        $setting = $modelSetting->find($input['id']);

        if(!$setting){
            return abort(404);
        }
        $input['logo_thumbnail'] = $setting['logo_thumbnail'];
        $input['logo'] = $input['logo_image_old'];
        if ($request->hasFile('logo_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('logo_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('logo_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('logo_image')->storeAs('upload/logo_images', $filenametostore);
            $input['logo'] = 'upload/logo_images/' . $filenametostore;

        }

        $modelSetting->updateSetting($setting, $input);
        $request->session()->flash('message_success', 'Cài đặt thành công');

        return redirect(route('edit_setting'));
    }

    public function uploadImg(Request $request){
        $function_number = $_GET['CKEditorFuncNum'];
        $message = '';

        $filenamewithextension = $request->file('upload')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('upload')->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename . '_' . time() . '.' . $extension;

        //Upload File
        $request->file('upload')->storeAs('upload/images', $filenametostore);
        $url =  '/upload/images/' . $filenametostore;

        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }

}