<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        if (! Company::count()) {
            $this->call(CompanySeeder::class);
            $this->call(DepartmentSeeder::class);
        }

        $company = Company::where('short_name', 'NEEPCO')->first();
        $departments = Department::all()->keyBy('name');

        $users = [
            // Admin
            ['full_name' => 'Admin User', 'jobtitle' => 'IT Admin', 'email' => 'admin@neepco.co.in', 'phone' => '7810404040', 'department' => 'Information Technology'],

            // Top Management
            ['full_name' => 'Gurdeep Singh', 'jobtitle' => 'CMD', 'email' => 'cmdneepco@neepco.co.in', 'phone' => '2224487', 'department' => 'CMD Secretariat'],
            ['full_name' => 'Ranendra Sarma', 'jobtitle' => 'Director(Tech)', 'email' => 'ranensarma@neepco.co.in', 'phone' => '9435012660', 'department' => 'Director (Technical) Secretariat'],
            ['full_name' => 'Major General Rajesh Kumar Jha', 'jobtitle' => 'Director (Pers.)', 'email' => 'directorper@neepco.co.in', 'phone' => '2226630', 'department' => 'Director (Personnel) Secretariat'],
            ['full_name' => 'Baidyanath Maharana', 'jobtitle' => 'Director (Fin.)', 'email' => 'bmaharana@neepco.co.in', 'phone' => '9435563039', 'department' => 'Finance and Accounts'],
            
            // Departments
            ['full_name' => 'Khwairakpam Pratap Singh', 'jobtitle' => 'CVO', 'email' => 'vigilance@neepco.co.in', 'phone' => '7086099086', 'department' => 'Chief Vigilance Officer'],
            ['full_name' => 'Abinoam P Rong', 'jobtitle' => 'Company Secy.', 'email' => 'company-secy@neepco.co.in', 'phone' => '7308161900', 'department' => 'Company Secretariat'],
            ['full_name' => 'Angelica Pohshna', 'jobtitle' => 'DGM(E/M)', 'email' => 'angelicap@neepco.co.in', 'phone' => '6009249201', 'department' => 'CMD Secretariat'],
            ['full_name' => 'Hemanta Baruah', 'jobtitle' => 'DGM(HR)', 'email' => 'hbaruah@neepco.co.in', 'phone' => '9436632420', 'department' => 'Director (Personnel) Secretariat'],
            ['full_name' => 'Diganta Goswami', 'jobtitle' => 'GM (E/M)', 'email' => 'digantag@neepco.co.in', 'phone' => '9957244779', 'department' => 'Director (Technical) Secretariat'],
            ['full_name' => 'Hitendra Bharali', 'jobtitle' => 'GM (Corporate Affairs)', 'email' => 'hitenbharali@neepco.co.in', 'phone' => '9650744533', 'department' => 'Corporate Affairs, Corporate Communications & Renewable Energy'],
            ['full_name' => 'Jayanta Kumar Sarma', 'jobtitle' => 'CGM (C)', 'email' => 'jsarma66@gmail.com', 'phone' => '9435577623', 'department' => 'Corporate Planning'],
            ['full_name' => 'Bonani Choudhury', 'jobtitle' => 'CGM (E/M)', 'email' => 'cpm@neepco.co.in', 'phone' => '9863063278', 'department' => 'Corporate Project Monitoring'],
            ['full_name' => 'Pranab Medhi', 'jobtitle' => 'GM (C)', 'email' => 'pranab.medhi@neepco.co.in', 'phone' => '9401380822', 'department' => 'Corporate Project Monitoring'],
            ['full_name' => 'Devapriya Choudhury', 'jobtitle' => 'CGM (E/M)', 'email' => 'devapriyac@neepco.co.in', 'phone' => '9435339747', 'department' => 'Commercial'],
            ['full_name' => 'Samiran Goswami', 'jobtitle' => 'ED (Tech)', 'email' => 'sgoswami@neepco.co.in', 'phone' => '9436700546', 'department' => 'Project Hydro & Tato & Heo'],
            ['full_name' => 'Bijit Kumar Goswami', 'jobtitle' => 'CGM(E/M)', 'email' => 'contract@neepco.co.in', 'phone' => '9436110244', 'department' => 'Contract and Procurement'],
            ['full_name' => 'Dipankar Baruah', 'jobtitle' => 'CGM(C)', 'email' => 'dipankar.baruah@neepco.co.in', 'phone' => '9485175793', 'department' => 'Contract and Procurement'],
            ['full_name' => 'S.S.Adhikari', 'jobtitle' => 'ED(Tech)', 'email' => 'Neepco_dne@yahoo.co.in', 'phone' => '9436129666', 'department' => 'Design & Engineering'],
            ['full_name' => 'Arup Saikia', 'jobtitle' => 'GM(RA)', 'email' => 'arupsaikia@neepco.co.in', 'phone' => '9864028617', 'department' => 'Material Management'],
            ['full_name' => 'Kamalendu Deb', 'jobtitle' => 'DGM (C)', 'email' => 'kamalendudeb@neepco.co.in', 'phone' => '9436127447', 'department' => 'Environment & RR'],
            ['full_name' => 'S.S. Adhikari', 'jobtitle' => 'ED(Tech)', 'email' => 'ssadhikari@neepco.co.in', 'phone' => '9436129666', 'department' => 'Project Acquisition & Business Development'],
            ['full_name' => 'Debjani Dey (Halder)', 'jobtitle' => 'ED (E/M)', 'email' => 'debjanidey@neepco.co.in', 'phone' => '2226707', 'department' => 'Operation & Maintenance'],
            ['full_name' => 'Joypal Roy', 'jobtitle' => 'GM(E/M)', 'email' => 'joypal_roy@rediffmail.com', 'phone' => '8837200069', 'department' => 'Operation & Maintenance'],
            ['full_name' => 'Malay Kr Mishra', 'jobtitle' => 'DGM(C)', 'email' => 'mkmisra09@gmail.com', 'phone' => '9436222656', 'department' => 'Vigilance'],
            ['full_name' => 'Rana Bose', 'jobtitle' => 'ED (F)', 'email' => 'ranabose@neepco.co.in', 'phone' => '9436632123', 'department' => 'Finance and Accounts'],
            ['full_name' => 'Dwijen Kumar', 'jobtitle' => 'CGM (F)', 'email' => 'dwijenk@rediffmail.com', 'phone' => '9435305245', 'department' => 'Finance and Accounts'],
            ['full_name' => 'A.A.P. Kujur', 'jobtitle' => 'GM(HR)', 'email' => 'kujur_neepco@rediffmail.com', 'phone' => '9436301907', 'department' => 'Human Resource'],
            ['full_name' => 'Rondeep Changkakoti', 'jobtitle' => 'GM(HR)', 'email' => 'rondeep_changkakoti@rediffmail.com', 'phone' => '9436117868', 'department' => 'Human Resource'],
            ['full_name' => 'M.K. Biswas', 'jobtitle' => 'DGM(E/M)', 'email' => 'mkbiswas_agtp@rediffmail.com', 'phone' => '8732807053', 'department' => 'Quality Assurance & Inspection'],
            ['full_name' => 'Jayanta Sharma', 'jobtitle' => 'CGM (C)', 'email' => 'jsharma@neepco.co.in', 'phone' => '9435577623', 'department' => 'Arbitration & Corporate Planning'],
            ['full_name' => 'Ashim Deb', 'jobtitle' => 'CGM (C)', 'email' => 'ashimdeb@neepco.co.in', 'phone' => '9436164491', 'department' => 'QSHE'],
            ['full_name' => 'Safer Ali Ahmed', 'jobtitle' => 'DGM(Civil)', 'email' => 'safarahmed1978@yahoo.com', 'phone' => '9435015246', 'department' => 'Land Acquisition'],
            ['full_name' => 'Dhrubajyoti Medhi', 'jobtitle' => 'GM(IT)', 'email' => 'djmedhi@neepco.co.in', 'phone' => '9863064745', 'department' => 'Information Technology'],
            ['full_name' => 'Madonna Grace Marbaniang', 'jobtitle' => 'GM(IT)', 'email' => 'madonnagrace@neepco.co.in', 'phone' => '9436732279', 'department' => 'Information Technology'],
            
            // Power Stations
            ['full_name' => 'Dilip Kr. Saikia', 'jobtitle' => 'GM(E/M)', 'email' => 'dksiakia64@gmail.com', 'phone' => '9402197808', 'department' => 'Kopili Hydro Power Station'],
            ['full_name' => 'Partha Sarthi Chanda', 'jobtitle' => 'GM(C)', 'email' => 'chandapartha37@gmail.com', 'phone' => '9706125695', 'department' => 'Kopili Hydro Power Station'],
            ['full_name' => 'Sri Ch R John Zeliang', 'jobtitle' => 'ED(Tech)', 'email' => 'johnzeliang@yahoo.co.in', 'phone' => '9871955966', 'department' => 'Doyang Hydro Power Station'],
            ['full_name' => 'Sri N. Orenthung Odyuo', 'jobtitle' => 'DGM (C)', 'email' => 'oren_odup@rediffmail.com', 'phone' => '8131080327', 'department' => 'Doyang Hydro Power Station'],
            ['full_name' => 'Bhupendra Goswami', 'jobtitle' => 'ED(Tech)', 'email' => 'bgoswami@neepco.co.in', 'phone' => '9436332682', 'department' => 'Assam Gas Based Power Station'],
            ['full_name' => 'Mohan Chandra Dihingia', 'jobtitle' => 'GM(C)', 'email' => 'dihingia.mohan@rediffmail.com', 'phone' => '9435339742', 'department' => 'Assam Gas Based Power Station'],
            ['full_name' => 'Nanda Basumatari', 'jobtitle' => 'CGM (E/M)', 'email' => 'nbasumatari@neepco.co.in', 'phone' => '9435339683', 'department' => 'Agartala Gas Based Power Station'],
            ['full_name' => 'Jiten Chandra Das', 'jobtitle' => 'GM (C)', 'email' => 'jitencdas@rediffmail.com', 'phone' => '9435546400', 'department' => 'Agartala Gas Based Power Station'],
            ['full_name' => 'Jitendra Lal Das', 'jobtitle' => 'GM (E/M)', 'email' => 'jld.neepco@yahoo.co.in', 'phone' => '9862811152', 'department' => 'Tripura Gas Based Power Station'],
            ['full_name' => 'Partha Pratim Das', 'jobtitle' => 'CGM (C)', 'email' => 'parthadas@neepco.co.iN', 'phone' => '9435559842', 'department' => 'Ranganadi Hydro Power Station'],
            ['full_name' => 'Dipankar Roy', 'jobtitle' => 'DGM(E/M)', 'email' => 'dipankar.roy@neepco.co.in', 'phone' => '9435701311', 'department' => 'Ranganadi Hydro Power Station'],
            ['full_name' => 'Abhijit Deb', 'jobtitle' => 'CGM (C)', 'email' => 'adeb19@rediffmail.com', 'phone' => '9435522357', 'department' => 'Tuirial Hydro Power Station'],
            ['full_name' => 'Dibyajyoti Chakraborty', 'jobtitle' => 'GM (E/M)', 'email' => 'dc_2005@rediffmail.com', 'phone' => '8575953966', 'department' => 'Tuirial Hydro Power Station'],
            ['full_name' => 'Dilip Kumar Baishya', 'jobtitle' => 'ED(Tech)', 'email' => 'dk_baishya@yahoo.com', 'phone' => '9436164685', 'department' => 'Pare Hydro Power Station'],
            ['full_name' => 'Girin Kr. Gogoi', 'jobtitle' => 'DGM (C)', 'email' => 'gogoigirin@rediffmail.com', 'phone' => '9435535796', 'department' => 'Pare Hydro Power Station'],
            ['full_name' => 'Nandeswar Bhuyan', 'jobtitle' => 'ED(Tech)', 'email' => 'nbhuyan@neepco.co.in', 'phone' => '9862072963', 'department' => 'Kameng Hydro Power Station'],
            ['full_name' => 'Bhaskar Goswami', 'jobtitle' => 'GM(E/M)', 'email' => 'bhaskargoswami@neepco.co.in', 'phone' => '9436163983', 'department' => 'Kameng Hydro Power Station'],
            ['full_name' => 'Kanchan Bhusan Paul', 'jobtitle' => 'GM(C)', 'email' => 'mawphuhep.neepco@gmail.com', 'phone' => '9436119297', 'department' => 'Wah Umium Hydro Electric Plant'],
            ['full_name' => 'Nirod Jyoti Goswami', 'jobtitle' => 'CGM(C)', 'email' => 'njgoswami05@yahoo.com', 'phone' => '9435591418', 'department' => 'Corporate Planning'],
        ];

        // Create the First Admin user
        $adminUser = array_shift($users);
        [$firstName, $lastName] = $this->parseName($adminUser['full_name']);
        User::factory()->firstAdmin()->create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'username' => strtolower(str_replace(' ', '', $firstName)),
            'email' => $adminUser['email'],
            'phone' => $adminUser['phone'],
            'jobtitle' => $adminUser['jobtitle'],
            'company_id' => $company->id,
            'department_id' => $departments[$adminUser['department']]->id,
        ]);

        // Create other users
        foreach ($users as $userData) {
            [$firstName, $lastName] = $this->parseName($userData['full_name']);
            if (isset($departments[$userData['department']])) {
                User::factory()->create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'username' => strtolower(str_replace(' ', '', $firstName.$lastName)).rand(10,99),
                    'email' => $userData['email'],
                    'phone' => $userData['phone'],
                    'jobtitle' => $userData['jobtitle'],
                    'company_id' => $company->id,
                    'department_id' => $departments[$userData['department']]->id,
                ]);
            }
        }
    }

    private function parseName($fullName)
    {
        $parts = explode(' ', trim($fullName));
        $lastName = array_pop($parts);
        $firstName = implode(' ', $parts);
        return [$firstName ?: $lastName, $lastName];
    }
}
