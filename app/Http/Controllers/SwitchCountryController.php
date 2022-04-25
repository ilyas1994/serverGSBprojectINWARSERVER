<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwitchCountryController extends Controller
{

    private function getCountry($country) {
      return  \DB::select("SELECT * FROM personal_datamba WHERE checkBoxMBAProgram LIKE '%".$country."%'");

    }

    public function index(Request $request) {

        $requestData = $request->input('city');

//        $city = explode('_',$request->input('countryVal')) ;

//        switch ($city[0]) {
        switch ($requestData) {

            case 'Алматы' : {
                $profileData = $this->getCountry('Алматы');

                return redirect()->back()->with('profileData', $profileData)->with('city','Алматы');
            }

            case 'Нур-Султан' : {
                $profileData = $this->getCountry('Нур-Султан');

                return redirect()->back()->with('profileData', $profileData)->with('city', 'Нур-Султан');
            }
            case 'Атырау' : {

                $profileData = $this->getCountry('Атырау');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city','Атырау');
            }
            case 'Актау' : {
                $profileData = $this->getCountry('Актау');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city','Актау');
            }
            case 'Актобе' : {
                $profileData = $this->getCountry('Актобе');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city','Актобе');
            }
            case 'Кызылорда' : {
                $profileData = $this->getCountry('Кызылорда');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city','Кызылорда');
            }
            case 'Шымкент' : {
                $profileData = $this->getCountry('Шымкент');
//                 dd($profileData);
                return redirect()->back()->with('profileData', $profileData)->with('city','Шымкент');
            }
        }
    }
}
