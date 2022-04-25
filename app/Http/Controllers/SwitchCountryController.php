<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwitchCountryController extends Controller
{

    private function getCountry($country) {
      return  \DB::select("SELECT * FROM personal_datamba WHERE checkBoxMBAProgram LIKE '%".$country."%'");

    }

    public function index(Request $request) {
//        dd($request->all());

//       dd($request->all());

//        $profileData = $this->getCountry('General MBA - Казахстанская программа MBA -> вечерняя программа в г. Алматы');
//                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);

        $city = explode('_',$request->input('countryVal')) ;
        switch ($city[0]) {

            case 'Алматы' : {
//                $city = 'Алматы';
//                dd($city);
                $profileData = $this->getCountry('Алматы');
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }

            case 'Нур-Султан' : {
                $profileData = $this->getCountry('Нур-Султан');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }
            case 'Атырау' : {
//                dd(123);
                $profileData = $this->getCountry('Атырау');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }
            case 'Актау' : {
                $profileData = $this->getCountry('Актау');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }
            case 'Актобе' : {
                $profileData = $this->getCountry('Актобе');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }
            case 'Кызылорда' : {
                $profileData = $this->getCountry('Кызылорда');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }
            case 'Шымкент' : {
                $profileData = $this->getCountry('Шымкент');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city',$city[1]);
            }
        }
    }
}
