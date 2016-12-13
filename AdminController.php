<?php

class AdminController extends BaseController {

	public function Dashboard()
	{
		return View::make('admin.dashboard');
	}

	public function Setting()
	{
		$post = Setting::find(1);
		return View::make('admin.setting',['post'=>$post]);
	}
	public function SettingHandle()
	{
		$post = Setting::find(1);
		$post->title = Input::get('title');
		$post->title_en = Input::get('title_en');
		$post->des = Input::get('des');
		$post->des_en = Input::get('des_en');
		$post->email = Input::get('email');
		$post->phone = Input::get('phone');
		$post->address = Input::get('address');
		$post->address_en = Input::get('address_en');
		$post->copyright = Input::get('copyright');
		$post->copyright_en = Input::get('copyright_en');
		$post->home_text = Input::get('home_text');
		$post->home_text_en = Input::get('home_text_en');
		if (Input::hasFile('background'))
	    {
			$n = Input::file('background')->getClientOriginalName();
			$t = time();
			$name = $t.$n;
			$up =  Input::file('background')
	     	->move('uploads',$name);
			$post->background = asset('/uploads/'.$name);
	    }
		if (Input::hasFile('logo'))
	    {
			$n = Input::file('logo')->getClientOriginalName();
			$t = time();
			$name = $t.$n;
			$up =  Input::file('logo')
	     	->move('uploads',$name);
			$post->logo = asset('/uploads/'.$name);
	    }
		if (Input::hasFile('icon'))
	    {
			$n = Input::file('icon')->getClientOriginalName();
			$t = time();
			$name = $t.$n;
			$up =  Input::file('icon')
	     	->move('uploads',$name);
			$post->icon = asset('/uploads/'.$name);
	    }
		$post->save();

		return Redirect::back()->with('success','تغییرات ذخیره شد.');
	}

}
