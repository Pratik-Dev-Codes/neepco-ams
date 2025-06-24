<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table first if needed
        // Empty the table first
        DB::table('permission_groups')->truncate();

        $groups = [
            [
                'name' => 'SuperUser',
                'permissions' => '{"superuser":"1","admin":"1","import":"1","reports.view":"1","assets.view":"1","assets.create":"1","assets.edit":"1","assets.delete":"1","assets.checkin":"1","assets.checkout":"1","assets.audit":"1","assets.view.requestable":"1","assets.view.encrypted_custom_fields":"1","accessories.view":"1","accessories.create":"1","accessories.edit":"1","accessories.delete":"1","accessories.checkout":"1","accessories.checkin":"1","accessories.files":"1","consumables.view":"1","consumables.create":"1","consumables.edit":"1","consumables.delete":"1","consumables.checkout":"1","consumables.files":"1","licenses.view":"1","licenses.create":"1","licenses.edit":"1","licenses.delete":"1","licenses.checkout":"1","licenses.keys":"1","licenses.files":"1","components.view":"1","components.create":"1","components.edit":"1","components.delete":"1","components.checkout":"1","components.checkin":"1","components.files":"1","kits.view":"1","kits.create":"1","kits.edit":"1","kits.delete":"1","users.view":"1","users.create":"1","users.edit":"1","users.delete":"1","models.view":"1","models.create":"1","models.edit":"1","models.delete":"1","categories.view":"1","categories.create":"1","categories.edit":"1","categories.delete":"1","departments.view":"1","departments.create":"1","departments.edit":"1","departments.delete":"1","statuslabels.view":"1","statuslabels.create":"1","statuslabels.edit":"1","statuslabels.delete":"1","customfields.view":"1","customfields.create":"1","customfields.edit":"1","customfields.delete":"1","suppliers.view":"1","suppliers.create":"1","suppliers.edit":"1","suppliers.delete":"1","manufacturers.view":"1","manufacturers.create":"1","manufacturers.edit":"1","manufacturers.delete":"1","depreciations.view":"1","depreciations.create":"1","depreciations.edit":"1","depreciations.delete":"1","locations.view":"1","locations.create":"1","locations.edit":"1","locations.delete":"1","companies.view":"1","companies.create":"1","companies.edit":"1","companies.delete":"1","self.two_factor":"1","self.api":"1","self.edit_location":"1","self.checkout_assets":"1","self.view_purchase_cost":"1"}',
                'notes' => 'This is a Super User. He has Root access to the System.',
                'created_by' => 1,
            ],
            [
                'name' => 'IT Admin',
                'permissions' => '{"superuser":"0","admin":"1","import":"1","reports.view":"1","assets.view":"1","assets.create":"1","assets.edit":"1","assets.delete":"1","assets.checkin":"1","assets.checkout":"1","assets.audit":"1","assets.view.requestable":"1","assets.view.encrypted_custom_fields":"1","accessories.view":"1","accessories.create":"1","accessories.edit":"1","accessories.delete":"1","accessories.checkout":"1","accessories.checkin":"1","accessories.files":"1","consumables.view":"1","consumables.create":"1","consumables.edit":"1","consumables.delete":"1","consumables.checkout":"1","consumables.files":"1","licenses.view":"1","licenses.create":"1","licenses.edit":"1","licenses.delete":"1","licenses.checkout":"1","licenses.keys":"1","licenses.files":"1","components.view":"1","components.create":"1","components.edit":"1","components.delete":"1","components.checkout":"1","components.checkin":"1","components.files":"1","kits.view":"1","kits.create":"1","kits.edit":"1","kits.delete":"1","users.view":"1","users.create":"1","users.edit":"1","users.delete":"1","models.view":"1","models.create":"1","models.edit":"1","models.delete":"1","categories.view":"1","categories.create":"1","categories.edit":"1","categories.delete":"1","departments.view":"1","departments.create":"1","departments.edit":"1","departments.delete":"1","statuslabels.view":"1","statuslabels.create":"1","statuslabels.edit":"1","statuslabels.delete":"1","customfields.view":"1","customfields.create":"1","customfields.edit":"1","customfields.delete":"1","suppliers.view":"1","suppliers.create":"1","suppliers.edit":"1","suppliers.delete":"1","manufacturers.view":"1","manufacturers.create":"1","manufacturers.edit":"1","manufacturers.delete":"1","depreciations.view":"1","depreciations.create":"1","depreciations.edit":"1","depreciations.delete":"1","locations.view":"1","locations.create":"1","locations.edit":"1","locations.delete":"1","companies.view":"1","companies.create":"1","companies.edit":"1","companies.delete":"1","self.two_factor":"1","self.api":"1","self.edit_location":"1","self.checkout_assets":"1","self.view_purchase_cost":"1"}',
                'notes' => 'This User has access to all the settings',
                'created_by' => 1,
            ],
            [
                'name' => 'IT Manager',
                'permissions' => '{"superuser":"0","admin":"0","import":"0","reports.view":"1","assets.view":"1","assets.create":"1","assets.edit":"1","assets.delete":"1","assets.checkin":"1","assets.checkout":"1","assets.audit":"1","assets.view.requestable":"1","assets.view.encrypted_custom_fields":"1","accessories.view":"1","accessories.create":"1","accessories.edit":"1","accessories.delete":"1","accessories.checkout":"1","accessories.checkin":"1","accessories.files":"1","consumables.view":"1","consumables.create":"1","consumables.edit":"1","consumables.delete":"1","consumables.checkout":"1","consumables.files":"1","licenses.view":"1","licenses.create":"1","licenses.edit":"1","licenses.delete":"1","licenses.checkout":"1","licenses.keys":"1","licenses.files":"1","components.view":"1","components.create":"1","components.edit":"1","components.delete":"1","components.checkout":"1","components.checkin":"1","components.files":"1","kits.view":"1","kits.create":"1","kits.edit":"1","kits.delete":"1","users.view":"1","users.create":"1","users.edit":"1","users.delete":"1","models.view":"1","models.create":"1","models.edit":"1","models.delete":"1","categories.view":"1","categories.create":"1","categories.edit":"1","categories.delete":"1","departments.view":"1","departments.create":"1","departments.edit":"1","departments.delete":"1","statuslabels.view":"1","statuslabels.create":"1","statuslabels.edit":"1","statuslabels.delete":"1","customfields.view":"1","customfields.create":"1","customfields.edit":"1","customfields.delete":"1","suppliers.view":"1","suppliers.create":"1","suppliers.edit":"1","suppliers.delete":"1","manufacturers.view":"1","manufacturers.create":"1","manufacturers.edit":"1","manufacturers.delete":"1","depreciations.view":"1","depreciations.create":"1","depreciations.edit":"1","depreciations.delete":"1","locations.view":"1","locations.create":"1","locations.edit":"1","locations.delete":"1","companies.view":"1","companies.create":"1","companies.edit":"1","companies.delete":"1","self.two_factor":"1","self.api":"1","self.edit_location":"1","self.checkout_assets":"1","self.view_purchase_cost":"1"}',
                'notes' => 'This User has access to all the features.',
                'created_by' => 1,
            ],
            [
                'name' => 'Personal',
                'permissions' => '{"superuser":"0","admin":"0","import":"0","reports.view":"1","assets.view":"1","assets.create":"1","assets.edit":"1","assets.delete":"0","assets.checkin":"1","assets.checkout":"1","assets.audit":"1","assets.view.requestable":"1","assets.view.encrypted_custom_fields":"0","accessories.view":"1","accessories.create":"1","accessories.edit":"1","accessories.delete":"0","accessories.checkout":"1","accessories.checkin":"1","accessories.files":"1","consumables.view":"1","consumables.create":"1","consumables.edit":"1","consumables.delete":"0","consumables.checkout":"1","consumables.files":"1","licenses.view":"1","licenses.create":"1","licenses.edit":"0","licenses.delete":"0","licenses.checkout":"1","licenses.keys":"1","licenses.files":"0","components.view":"1","components.create":"1","components.edit":"1","components.delete":"0","components.checkout":"1","components.checkin":"1","components.files":"0","kits.view":"1","kits.create":"1","kits.edit":"1","kits.delete":"0","users.view":"1","users.create":"0","users.edit":"0","users.delete":"0","models.view":"1","models.create":"0","models.edit":"0","models.delete":"0","categories.view":"1","categories.create":"0","categories.edit":"0","categories.delete":"0","departments.view":"1","departments.create":"0","departments.edit":"0","departments.delete":"0","statuslabels.view":"1","statuslabels.create":"1","statuslabels.edit":"0","statuslabels.delete":"0","customfields.view":"1","customfields.create":"0","customfields.edit":"0","customfields.delete":"0","suppliers.view":"1","suppliers.create":"0","suppliers.edit":"0","suppliers.delete":"0","manufacturers.view":"1","manufacturers.create":"0","manufacturers.edit":"0","manufacturers.delete":"0","depreciations.view":"1","depreciations.create":"0","depreciations.edit":"0","depreciations.delete":"0","locations.view":"1","locations.create":"0","locations.edit":"0","locations.delete":"0","companies.view":"1","companies.create":"0","companies.edit":"0","companies.delete":"0","self.two_factor":"1","self.api":"1","self.edit_location":"1","self.checkout_assets":"1","self.view_purchase_cost":"1"}',
                'notes' => 'This is a normal User which has minimal access to the features of this system.',
                'created_by' => 1,
            ],
        ];

        // Insert groups
        foreach ($groups as $group) {
            DB::table('permission_groups')->insert([
                'name' => $group['name'],
                'permissions' => $group['permissions'],
                'notes' => $group['notes'],
                'created_by' => $group['created_by'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
