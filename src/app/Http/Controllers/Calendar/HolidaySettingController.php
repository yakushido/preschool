<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HolidaySetting;

class HolidaySettingController extends Controller
{
    public function form(){
		
		//取得
		$setting = HolidaySetting::firstOrNew();
		return view("calendar/holiday_setting_form", [
			"setting" => $setting,
			"FLAG_OPEN" => HolidaySetting::OPEN,
			"FLAG_CLOSE" => HolidaySetting::CLOSE
		]);
	}
	public function update(Request $request){
		//取得
		$setting = HolidaySetting::firstOrNew();
		//更新
		$setting['flag_mon'] = $request->input('flag_mon');
		$setting['flag_tue'] = $request->input('flag_tue');
		$setting['flag_wed'] = $request->input('flag_wed');
		$setting['flag_thu'] = $request->input('flag_thu');
		$setting['flag_fri'] = $request->input('flag_fri');
		$setting['flag_sat'] = $request->input('flag_sat');
		$setting['flag_sun'] = $request->input('flag_sun');
		$setting['flag_holiday'] = $request->input('flag_holiday');
		$setting->save();
		
		return redirect()
            ->route('holiday_setting')
			->withStatus("保存しました");
	}
}
