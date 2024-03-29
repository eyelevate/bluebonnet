<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function prepareStates()
    {
        return array(
            '' => 'Select A State',
            'AL'=>'ALABAMA',
            'AK'=>'ALASKA',
            'AS'=>'AMERICAN SAMOA',
            'AZ'=>'ARIZONA',
            'AR'=>'ARKANSAS',
            'CA'=>'CALIFORNIA',
            'CO'=>'COLORADO',
            'CT'=>'CONNECTICUT',
            'DE'=>'DELAWARE',
            'DC'=>'DISTRICT OF COLUMBIA',
            'FM'=>'FEDERATED STATES OF MICRONESIA',
            'FL'=>'FLORIDA',
            'GA'=>'GEORGIA',
            'GU'=>'GUAM GU',
            'HI'=>'HAWAII',
            'ID'=>'IDAHO',
            'IL'=>'ILLINOIS',
            'IN'=>'INDIANA',
            'IA'=>'IOWA',
            'KS'=>'KANSAS',
            'KY'=>'KENTUCKY',
            'LA'=>'LOUISIANA',
            'ME'=>'MAINE',
            'MH'=>'MARSHALL ISLANDS',
            'MD'=>'MARYLAND',
            'MA'=>'MASSACHUSETTS',
            'MI'=>'MICHIGAN',
            'MN'=>'MINNESOTA',
            'MS'=>'MISSISSIPPI',
            'MO'=>'MISSOURI',
            'MT'=>'MONTANA',
            'NE'=>'NEBRASKA',
            'NV'=>'NEVADA',
            'NH'=>'NEW HAMPSHIRE',
            'NJ'=>'NEW JERSEY',
            'NM'=>'NEW MEXICO',
            'NY'=>'NEW YORK',
            'NC'=>'NORTH CAROLINA',
            'ND'=>'NORTH DAKOTA',
            'MP'=>'NORTHERN MARIANA ISLANDS',
            'OH'=>'OHIO',
            'OK'=>'OKLAHOMA',
            'OR'=>'OREGON',
            'PW'=>'PALAU',
            'PA'=>'PENNSYLVANIA',
            'PR'=>'PUERTO RICO',
            'RI'=>'RHODE ISLAND',
            'SC'=>'SOUTH CAROLINA',
            'SD'=>'SOUTH DAKOTA',
            'TN'=>'TENNESSEE',
            'TX'=>'TEXAS',
            'UT'=>'UTAH',
            'VT'=>'VERMONT',
            'VI'=>'VIRGIN ISLANDS',
            'VA'=>'VIRGINIA',
            'WA'=>'WASHINGTON',
            'WV'=>'WEST VIRGINIA',
            'WI'=>'WISCONSIN',
            'WY'=>'WYOMING',
            'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
            'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
            'AP'=>'ARMED FORCES PACIFIC'
        );
    }

    public function prepareCountries()
    {
        $countries = array(
            'AF'=>'AFGHANISTAN',
            'AL'=>'ALBANIA',
            'DZ'=>'ALGERIA',
            'AS'=>'AMERICAN SAMOA',
            'AD'=>'ANDORRA',
            'AO'=>'ANGOLA',
            'AI'=>'ANGUILLA',
            'AQ'=>'ANTARCTICA',
            'AG'=>'ANTIGUA AND BARBUDA',
            'AR'=>'ARGENTINA',
            'AM'=>'ARMENIA',
            'AW'=>'ARUBA',
            'AU'=>'AUSTRALIA',
            'AT'=>'AUSTRIA',
            'AZ'=>'AZERBAIJAN',
            'BS'=>'BAHAMAS',
            'BH'=>'BAHRAIN',
            'BD'=>'BANGLADESH',
            'BB'=>'BARBADOS',
            'BY'=>'BELARUS',
            'BE'=>'BELGIUM',
            'BZ'=>'BELIZE',
            'BJ'=>'BENIN',
            'BM'=>'BERMUDA',
            'BT'=>'BHUTAN',
            'BO'=>'BOLIVIA',
            'BA'=>'BOSNIA AND HERZEGOVINA',
            'BW'=>'BOTSWANA',
            'BV'=>'BOUVET ISLAND',
            'BR'=>'BRAZIL',
            'IO'=>'BRITISH INDIAN OCEAN TERRITORY',
            'BN'=>'BRUNEI DARUSSALAM',
            'BG'=>'BULGARIA',
            'BF'=>'BURKINA FASO',
            'BI'=>'BURUNDI',
            'KH'=>'CAMBODIA',
            'CM'=>'CAMEROON',
            'CA'=>'CANADA',
            'CV'=>'CAPE VERDE',
            'KY'=>'CAYMAN ISLANDS',
            'CF'=>'CENTRAL AFRICAN REPUBLIC',
            'TD'=>'CHAD',
            'CL'=>'CHILE',
            'CN'=>'CHINA',
            'CX'=>'CHRISTMAS ISLAND',
            'CC'=>'COCOS (KEELING) ISLANDS',
            'CO'=>'COLOMBIA',
            'KM'=>'COMOROS',
            'CG'=>'CONGO',
            'CD'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
            'CK'=>'COOK ISLANDS',
            'CR'=>'COSTA RICA',
            'CI'=>'COTE D IVOIRE',
            'HR'=>'CROATIA',
            'CU'=>'CUBA',
            'CY'=>'CYPRUS',
            'CZ'=>'CZECH REPUBLIC',
            'DK'=>'DENMARK',
            'DJ'=>'DJIBOUTI',
            'DM'=>'DOMINICA',
            'DO'=>'DOMINICAN REPUBLIC',
            'TP'=>'EAST TIMOR',
            'EC'=>'ECUADOR',
            'EG'=>'EGYPT',
            'SV'=>'EL SALVADOR',
            'GQ'=>'EQUATORIAL GUINEA',
            'ER'=>'ERITREA',
            'EE'=>'ESTONIA',
            'ET'=>'ETHIOPIA',
            'FK'=>'FALKLAND ISLANDS (MALVINAS)',
            'FO'=>'FAROE ISLANDS',
            'FJ'=>'FIJI',
            'FI'=>'FINLAND',
            'FR'=>'FRANCE',
            'GF'=>'FRENCH GUIANA',
            'PF'=>'FRENCH POLYNESIA',
            'TF'=>'FRENCH SOUTHERN TERRITORIES',
            'GA'=>'GABON',
            'GM'=>'GAMBIA',
            'GE'=>'GEORGIA',
            'DE'=>'GERMANY',
            'GH'=>'GHANA',
            'GI'=>'GIBRALTAR',
            'GR'=>'GREECE',
            'GL'=>'GREENLAND',
            'GD'=>'GRENADA',
            'GP'=>'GUADELOUPE',
            'GU'=>'GUAM',
            'GT'=>'GUATEMALA',
            'GN'=>'GUINEA',
            'GW'=>'GUINEA-BISSAU',
            'GY'=>'GUYANA',
            'HT'=>'HAITI',
            'HM'=>'HEARD ISLAND AND MCDONALD ISLANDS',
            'VA'=>'HOLY SEE (VATICAN CITY STATE)',
            'HN'=>'HONDURAS',
            'HK'=>'HONG KONG',
            'HU'=>'HUNGARY',
            'IS'=>'ICELAND',
            'IN'=>'INDIA',
            'ID'=>'INDONESIA',
            'IR'=>'IRAN, ISLAMIC REPUBLIC OF',
            'IQ'=>'IRAQ',
            'IE'=>'IRELAND',
            'IL'=>'ISRAEL',
            'IT'=>'ITALY',
            'JM'=>'JAMAICA',
            'JP'=>'JAPAN',
            'JO'=>'JORDAN',
            'KZ'=>'KAZAKSTAN',
            'KE'=>'KENYA',
            'KI'=>'KIRIBATI',
            'KP'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
            'KR'=>'KOREA REPUBLIC OF',
            'KW'=>'KUWAIT',
            'KG'=>'KYRGYZSTAN',
            'LA'=>'LAO PEOPLES DEMOCRATIC REPUBLIC',
            'LV'=>'LATVIA',
            'LB'=>'LEBANON',
            'LS'=>'LESOTHO',
            'LR'=>'LIBERIA',
            'LY'=>'LIBYAN ARAB JAMAHIRIYA',
            'LI'=>'LIECHTENSTEIN',
            'LT'=>'LITHUANIA',
            'LU'=>'LUXEMBOURG',
            'MO'=>'MACAU',
            'MK'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
            'MG'=>'MADAGASCAR',
            'MW'=>'MALAWI',
            'MY'=>'MALAYSIA',
            'MV'=>'MALDIVES',
            'ML'=>'MALI',
            'MT'=>'MALTA',
            'MH'=>'MARSHALL ISLANDS',
            'MQ'=>'MARTINIQUE',
            'MR'=>'MAURITANIA',
            'MU'=>'MAURITIUS',
            'YT'=>'MAYOTTE',
            'MX'=>'MEXICO',
            'FM'=>'MICRONESIA, FEDERATED STATES OF',
            'MD'=>'MOLDOVA, REPUBLIC OF',
            'MC'=>'MONACO',
            'MN'=>'MONGOLIA',
            'MS'=>'MONTSERRAT',
            'MA'=>'MOROCCO',
            'MZ'=>'MOZAMBIQUE',
            'MM'=>'MYANMAR',
            'NA'=>'NAMIBIA',
            'NR'=>'NAURU',
            'NP'=>'NEPAL',
            'NL'=>'NETHERLANDS',
            'AN'=>'NETHERLANDS ANTILLES',
            'NC'=>'NEW CALEDONIA',
            'NZ'=>'NEW ZEALAND',
            'NI'=>'NICARAGUA',
            'NE'=>'NIGER',
            'NG'=>'NIGERIA',
            'NU'=>'NIUE',
            'NF'=>'NORFOLK ISLAND',
            'MP'=>'NORTHERN MARIANA ISLANDS',
            'NO'=>'NORWAY',
            'OM'=>'OMAN',
            'PK'=>'PAKISTAN',
            'PW'=>'PALAU',
            'PS'=>'PALESTINIAN TERRITORY, OCCUPIED',
            'PA'=>'PANAMA',
            'PG'=>'PAPUA NEW GUINEA',
            'PY'=>'PARAGUAY',
            'PE'=>'PERU',
            'PH'=>'PHILIPPINES',
            'PN'=>'PITCAIRN',
            'PL'=>'POLAND',
            'PT'=>'PORTUGAL',
            'PR'=>'PUERTO RICO',
            'QA'=>'QATAR',
            'RE'=>'REUNION',
            'RO'=>'ROMANIA',
            'RU'=>'RUSSIAN FEDERATION',
            'RW'=>'RWANDA',
            'SH'=>'SAINT HELENA',
            'KN'=>'SAINT KITTS AND NEVIS',
            'LC'=>'SAINT LUCIA',
            'PM'=>'SAINT PIERRE AND MIQUELON',
            'VC'=>'SAINT VINCENT AND THE GRENADINES',
            'WS'=>'SAMOA',
            'SM'=>'SAN MARINO',
            'ST'=>'SAO TOME AND PRINCIPE',
            'SA'=>'SAUDI ARABIA',
            'SN'=>'SENEGAL',
            'SC'=>'SEYCHELLES',
            'SL'=>'SIERRA LEONE',
            'SG'=>'SINGAPORE',
            'SK'=>'SLOVAKIA',
            'SI'=>'SLOVENIA',
            'SB'=>'SOLOMON ISLANDS',
            'SO'=>'SOMALIA',
            'ZA'=>'SOUTH AFRICA',
            'GS'=>'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
            'ES'=>'SPAIN',
            'LK'=>'SRI LANKA',
            'SD'=>'SUDAN',
            'SR'=>'SURINAME',
            'SJ'=>'SVALBARD AND JAN MAYEN',
            'SZ'=>'SWAZILAND',
            'SE'=>'SWEDEN',
            'CH'=>'SWITZERLAND',
            'SY'=>'SYRIAN ARAB REPUBLIC',
            'TW'=>'TAIWAN, PROVINCE OF CHINA',
            'TJ'=>'TAJIKISTAN',
            'TZ'=>'TANZANIA, UNITED REPUBLIC OF',
            'TH'=>'THAILAND',
            'TG'=>'TOGO',
            'TK'=>'TOKELAU',
            'TO'=>'TONGA',
            'TT'=>'TRINIDAD AND TOBAGO',
            'TN'=>'TUNISIA',
            'TR'=>'TURKEY',
            'TM'=>'TURKMENISTAN',
            'TC'=>'TURKS AND CAICOS ISLANDS',
            'TV'=>'TUVALU',
            'UG'=>'UGANDA',
            'UA'=>'UKRAINE',
            'AE'=>'UNITED ARAB EMIRATES',
            'GB'=>'UNITED KINGDOM',
            'US'=>'UNITED STATES',
            'UM'=>'UNITED STATES MINOR OUTLYING ISLANDS',
            'UY'=>'URUGUAY',
            'UZ'=>'UZBEKISTAN',
            'VU'=>'VANUATU',
            'VE'=>'VENEZUELA',
            'VN'=>'VIET NAM',
            'VG'=>'VIRGIN ISLANDS, BRITISH',
            'VI'=>'VIRGIN ISLANDS, U.S.',
            'WF'=>'WALLIS AND FUTUNA',
            'EH'=>'WESTERN SAHARA',
            'YE'=>'YEMEN',
            'YU'=>'YUGOSLAVIA',
            'ZM'=>'ZAMBIA',
            'ZW'=>'ZIMBABWE',
          );

        return $countries;
    }

    public function prepareChartData($type)
    {
        $user = new User;
        //Main navigation

        $panelIconOpened = 'icon-arrow-up';
        $panelIconClosed = 'icon-arrow-down';

        //Default colours
        $brandPrimary =  '#20a8d8';
        $brandSuccess =  '#4dbd74';
        $brandInfo =     '#63c2de';
        $brandWarning =  '#f8cb00';
        $brandDanger =   '#f86c6b';

        $grayDark =      '#2a2c36';
        $gray =          '#55595c';
        $grayLight =     '#818a91';
        $grayLighter =   '#d1d4d7';
        $grayLightest =  '#f8f9fa';
        $data = [];
        switch ($type) {
            case 'admins-index':
                
                // Customers
                $customers_logged_in = count($user->getOnlineByRole($user->allOnline(), 4));
                $customers = $user->where('role_id', 4)->count() - $customers_logged_in;
                $data['chart1'] = [
                    'type'=>'doughnut',
                    'labels'=>['Logged In','Not Logged In'],
                    'datasets'=> [
                        'label'=>'Customers Logged In',
                        'backgroundColor'=> [$brandPrimary, $grayLightest],
                        'borderColor' => 'rgba(255,255,255,.55)',
                        'data'=> [$customers_logged_in,$customers]

                    ]
                ];
                // Employees
                $employees_logged_in = count($user->getOnlineByRole($user->allOnline(), 3));
                $employees = $user->where('role_id', 3)->count() - $employees_logged_in;
                $data['chart2'] = [
                    'type'=>'doughnut',
                    'labels'=>['Logged In','Not Logged In'],
                    'datasets'=> [
                        'label'=>'Employees Logged In',
                        'backgroundColor'=> [$brandInfo,$grayLightest],
                        'borderColor' => 'rgba(255,255,255,.55)',
                        'data'=> [$employees_logged_in,$employees]

                    ]
                ];

                // Managers
                $managers_logged_in = count($user->getOnlineByRole($user->allOnline(), 2));
                $managers = $user->where('role_id', 2)->count() - $managers_logged_in;
                $data['chart3'] = [
                    'type'=>'doughnut',
                    'labels'=>['Logged In','Not Logged In'],
                    'datasets'=> [
                        'label'=>'Managers Logged In',
                        'backgroundColor'=> [$brandWarning,$grayLightest],
                        'borderColor' => 'rgba(255,255,255,.55)',
                        'data'=> [$managers_logged_in,$managers]

                    ]
                ];

                // Partners
                $partners_logged_in = count($user->getOnlineByRole($user->allOnline(), 1));
                $partners = $user->where('role_id', 1)->count() - $partners_logged_in;
                $data['chart4'] = [
                    'type'=>'doughnut',
                    'labels'=>['Logged In','Not Logged In'],
                    'datasets'=> [
                        'label'=>'Partners Logged In',
                        'backgroundColor'=> [$brandDanger,$grayLightest],
                        'borderColor' => 'rgba(255,255,255,.55)',
                        'data'=> [$partners_logged_in,$partners]

                    ]
                ];

                // Traffic Map
                $data['main-chart'] = [];
                break;
            
            default:
                # code...
                break;
        }

        return $data;
    }

    public function prepareHours()
    {
        $hours = [];
        for ($i=1; $i <= 12; $i++) {
            $hours[$i] = $i;
        }
        return $hours;
    }

    public function prepareMinutes()
    {
        $minutes = [];
        for ($i=0; $i < 60 ; $i++) {
            $minutes[str_pad($i, 2, "0", STR_PAD_LEFT)] = ':'.str_pad($i, 2, "0", STR_PAD_LEFT);
        }

        return $minutes;
    }

    public function prepareAmpm()
    {
        return ['am'=>'AM','pm'=>'PM'];
    }

    public function prepareOpen()
    {
        return ['open'=>'Open','closed'=>'Closed'];
    }

    public function prepareDays()
    {
        return [0=>'Sunday',1=>'Monday',2=>'Tuesday',3=>'Wednesday',4=>'Thursday',5=>'Friday',6=>'Saturday'];
    }

    public function stringToDotDotDot($string, $chars = 20)
    {
        return (strlen($string) > $chars) ? substr($string, 0, $chars) . '...' : $string;
    }

    public function switchLayout($theme)
    {
        $layout = '';
        switch ($theme) {
            case 1:
                $layout = 'layouts.themes.theme1.layout';
                break;
            case 2:
                $layout = 'layouts.themes.theme2.layout';
                break;
            default:
                $layout = 'layouts.themes.theme1.layout';
                break;
        }

        return $layout;
    }

    public function switchHomeView($theme)
    {
        $view = '';
        switch ($theme) {
            case 1:
                $view = 'home.index';
                break;
            case 2:
                $view = 'home.index2';
                break;
            default:
                $view = 'home.index';
                break;
        }

        return $view;
    }

    public static function formatPhoneString($data)
    {
        return "(".substr($data, 0, 3).") ".substr($data, 3, 3)."-".substr($data, 6);
    }

    public function formatPhone($data)
    {
        $data = $this->stripAllButNumbers($data);
        return "(".substr($data, 0, 3).") ".substr($data, 3, 3)."-".substr($data, 6);
    }

    public function stripAllButNumbers($number)
    {
        return preg_replace('/\D/', '', $number);
    }
}