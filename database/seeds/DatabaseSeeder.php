<?php
use App\DataLayer\CarTradingDBAccess;
use Illuminate\Database\Seeder;
use App\Model\Country;
use App\Model\SeaPort;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i = 0; $i < 5; $i++)
        {
        DB::table('companies')->insert([
            'CompanyName' => "Company".$i,
            'Address' => "Address".$i,
            'Country' => "Country".$i,
        ]);
        }

        for ($i = 0; $i < 10; $i++)
        {
        DB::table('brands')->insert([
            'BrandName' => "Brand".$i,
            'CompanyID' => $i%5 +1,
        ]);
        }

        DB::table('users')->insert([
            'UserFullName' => "Md. Rukunujjaman Miaji",
            'Email' => "rukucse11@gmail.com",
            'ContactNumber' => "01719721908",
            'User_name' => "ruku11",
            'password' => bcrypt("ruku11"),
        ]); 

        //////////////////////////
        /* REGION A */ 
        $List = array(
            0 => "Australia-Adelaide-AU PAE",
            1 => "Australia-Brisbane-AU BNE",
            2 => "Australia-Cairns-AU CNS",
            3 => "Australia-Darwin-AU DRW",
            4 => "Australia-Devonport-AU DPO",
            5 => "Australia-Fremantle-AU FRE",
            6 => "Australia-Geelong-AU GEX",
            7 => "Australia-Hobart-AU HBA",
            8 => "Australia-Mackay-AU MKY",
            9 => "Australia-Melbourne-AU MEL",
            10 => "Australia-Sydney-AU SYD",
            11 => "Australia-Townsville-AU TSV",

            12 => "Bahrain-Mina Salman-BH MIN",
            13 => "Bahrain-Sitra-BH SIT",

            14 => "Bangladesh-Chittagong-BD CGP",
            15 => "Bangladesh-Mongla-BD MGL",

            16 => "Cyprus-Akrotiri-CY AKT",
            17 => "Cyprus-Famagusta-CY FMG",
            18 => "Cyprus-Larnaca-CY LAT",
            19 => "Cyprus-Limassol-CY LMS",
            20 => "Cyprus-Paphos-CY PFO",
            21 => "Cyprus-Vassiliko-CY VAS",

            22 => "Egypt-Alexandria-EG EDK",
            23 => "Egypt-Damietta-EG DAM",
            24 => "Egypt-Port Said-EG PSD",
            25 => "Egypt-Suez (Al Suweis)-EG",

            26 => "Iran-Abadan-IR ABD",
            27 => "Iran-Bandar Abbas-IR BND",
            28 => "Iran-Bandar Anzali-IR BAZ",
            29 => "Iran-Bandar Mahshahr-IR MRX",
            30 => "Iran-Bushehr-IR BUZ",
            31 => "Iran-Imam Khomeini-IR BKM",
            32 => "Iran-Khorramshahr-IR KHO",
            33 => "Iran-Lavan-IR LVP",
            34 => "Iran-Sirri Island-IR SXI",

            35 => "Iraq-Basra-IQ BSR",
            36 => "Iraq-Khor al Zubair-IQ KAZ",
            37 => "Iraq-Umm Qasr-IQ KAZ",

            38 => "Jordan-Aqaba (El Akaba)-JO AQJ",

            39 => "Kuwait-Mina al Ahmadi-KW MEA",
            40 => "Kuwait-Mina Saud-KW MIS",
            41 => "Kuwait-Shuwaikh-KW SWK",

            42 => "Myanmar-Bassein-MM BSX",
            43 => "Myanmar-Moulmein-MM MNU",
            44 => "Myanmar-Yangon-MM RGN",

            45 => "Pakistan-Karachi-PK KHI",
            46 => "Pakistan-Muhammad Bin Qasim - PK BQM",

            47 => "Quatar-Doha-QA DOH",
            48 => "Quatar-Halul Island-QA HAL",
            49 => "Quatar-Ras Laffan-QA RLF",
            50 => "Quatar-Umm Said (Mesaieed)-QA UMS",

            51 => "Saudi Arabia-Dammam-SA DMN",
            52 => "Saudi Arabia-Dhuba-SA DHU",
            53 => "Saudi Arabia-Gizan-SA GIZ",
            54 => "Saudi Arabia-Jeddah-SA JED",
            55 => "Saudi Arabia-Jubail-SA JUB",
            56 => "Saudi Arabia-Rabigh-SA RAB",
            57 => "Saudi Arabia-Ras al Mishab-SA RAM",
            58 => "Saudi Arabia-Ras Tanura-SA RTA",
            59 => "Saudi Arabia-Yanbu-SA YNB",

            60 => "Srilanka-Colombo-LK CMB",
            61 => "Srilanka-Jaffna-LK JAF",
            62 => "Srilanka-Trincomalee-LK TRR",

            63 => "Syria-Baniyas-SY BAN",

            64 => "Turkey-Dikili-TR DIK",
            65 => "Turkey-Gemlik-TR GEM",
            66 => "Turkey-Hopa, Artvin-TR HOP",
            67 => "Turkey-Iskenderun, Hatay-TR ISK",
            68 => "Turkey-Istanbul-TR IST",
            69 => "Turkey-Trabzon-TR TZX",

            70 => "Unitated Arab Emirates-Ajman-AE AJM",
            71 => "Unitated Arab Emirates-Das Island-AE DAS",
            72 => "Unitated Arab Emirates-Dubai (Port Rashid)-AE DXB",
            73 => "Unitated Arab Emirates-Fujairah-AE FJR",
            74 => "Unitated Arab Emirates-Jebel Dhanna/Ruwais-AE JEA",
            75 => "Unitated Arab Emirates-Khor Fakkan-AE KLF",
            76 => "Unitated Arab Emirates-Mina Saqr-AE MSA",
            77 => "Unitated Arab Emirates-Mina Zayed-AE MZD",
 
        );

        for ($i=0; $i <count($List); $i++) { 
           
            list($part1, $part2,$part3) = explode('-', $List[$i]);
            $countryname = $part1;
            $seaportname = $part2;
            $seaportcode = $part3;

            $DBAAccess = new CarTradingDBAccess();
            $country = $DBAAccess->IsCountryExist($countryname);
           

            if ($country == false)
            {
                $classcountry = new Country();
                $classcountry->CountryName = $countryname;

                $DBAAccess->AddCountry($classcountry);
            }

             $countryinfo = $DBAAccess->GetCountryInfoByCountryName($countryname);
            
                if ($countryinfo != null)
                {
                    $seaportnew = new SeaPort();
                    $seaportnew->CountryID = $countryinfo->CountryID;
                    $seaportnew->SerPortName = $seaportname;
                    $seaportnew->SerPortCode = $seaportcode;
                    $DBAAccess->AddSeaPort($seaportnew);
                }
        }

            $classcountry = new Country();
            $classcountry->CountryName = "Other";
            $DBAAccess->AddCountry($classcountry);
                
            $countryname = "Other";
            $countryinfo = $DBAAccess->GetCountryInfoByCountryName($countryname);

            $seaportnew = new SeaPort();
            $seaportnew->CountryID = $countryinfo->CountryID;
            $seaportnew->SerPortName = "Other";
            $seaportnew->SerPortCode = "Other";
            $DBAAccess->AddSeaPort($seaportnew);
    }
}
