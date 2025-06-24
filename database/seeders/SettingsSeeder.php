<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        // Truncate existing settings
        Setting::truncate();
        
        // Create new settings instance
        $settings = new Setting;
        
        // General Settings
        $settings->site_name = 'NEEPCO Ltd. Asset Management System';
        $settings->default_currency = 'INR';
        $settings->locale = 'en-US';
        $settings->logo = 'neepco-logo.png';
        $settings->skin = 'blue';
        $settings->brand = 3;
        $settings->per_page = 20;
        $settings->digit_separator = '1,234.56';
        $settings->support_footer = 'on';
        $settings->version_footer = 'on';
        
        // Email Settings
        $settings->alert_email = 'pratikadhikary.work@gmail.com';
        $settings->email_domain = 'neepco.co.in';
        $settings->email_format = 'filastname';
        $settings->admin_cc_email = null;
        $settings->admin_cc_always = 1;
        $settings->show_images_in_email = 1;
        $settings->show_url_in_emails = 1;
        $settings->email_logo = 'neepco-logo.png';
        
        // Display Settings
        $settings->date_display_format = 'D M d, Y';
        $settings->time_display_format = 'g:iA';
        $settings->thumbnail_max_h = 30;
        
        // Asset Settings
        $settings->auto_increment_assets = 1;
        $settings->auto_increment_prefix = '';
        $settings->unique_serial = 0;
        $settings->logo_print_assets = 1;
        $settings->depreciation_method = 'default';
        $settings->default_eula_text = null;
        $settings->display_asset_name = 1;
        $settings->display_checkout_date = 1;
        $settings->display_eol = 1;
        $settings->qr_code = 0;
        $settings->qr_text = 'assets';
        
        // Barcode/Label Settings
        $settings->label2_enable = 1;
        $settings->label2_template = 'DefaultLabel';
        $settings->label2_title = 'NEEPCO LTD.';
        $settings->label2_asset_logo = 0;
        $settings->label2_1d_type = 'C128';
        $settings->label2_2d_type = 'QRCODE';
        $settings->label2_2d_target = 'hardware_id';
        $settings->label2_fields = '=company.name;name=name;serial=serial;model=model.name';
        $settings->label2_empty_row_count = 0;
        
        // Security Settings
        $settings->pwd_secure_min = '8';
        $settings->pwd_secure_uncommon = 0;
        $settings->pwd_secure_complexity = '';
        $settings->ldap_enabled = 0;
        $settings->login_remote_user_enabled = 1;
        $settings->login_common_disabled = 0;
        $settings->login_remote_user_header_name = '';
        $settings->login_remote_user_custom_logout_url = '';
        $settings->google_login = 1;
        $settings->google_client_id = null;
        $settings->google_client_secret = null;
        $settings->ldap_invert_active_flag = 0;
        $settings->ldap_client_tls_cert = null;
        $settings->ldap_client_tls_key = null;
        
        // SAML Settings
        $settings->saml_enabled = 0;
        $settings->saml_idp_metadata = null;
        $settings->saml_attr_mapping_username = null;
        $settings->saml_forcelogin = 0;
        $settings->saml_slo = 0;
        $settings->saml_sp_x509cert = null;
        $settings->saml_sp_privatekey = null;
        $settings->saml_custom_settings = null;
        $settings->saml_sp_x509certNew = null;
        
        // Organization Settings
        $settings->full_multiple_companies_support = 1;
        $settings->require_accept_signature = 0;
        $settings->labels_display_company_name = 0;
        $settings->labels_display_model = 0;
        $settings->privacy_policy_link = null;
        
        // User Settings
        $settings->username_format = 'filastname';
        $settings->default_avatar = 'default.png';
        $settings->profile_edit = 1;
        $settings->require_checkinout_notes = 0;
        $settings->shortcuts_enabled = 0;
        $settings->due_checkin_days = null;
        $settings->two_factor_enabled = 1;
        
        // UI Settings
        $settings->header_color = null;
        $settings->allow_user_skin = 1;
        $settings->show_assigned_assets = 0;
        $settings->manager_view_enabled = 1;
        $settings->modellist_displays = 'image,category,manufacturer,model_number';
        $settings->show_archived_in_list = 0;
        $settings->show_alerts_in_menu = 1;
        
        // File Upload Settings
        $settings->favicon = null;
        $settings->email_logo = null;
        $settings->label_logo = null;
        $settings->acceptance_pdf_logo = null;
        
        // Dashboard Settings
        $settings->dashboard_message = '🏭 Welcome to NEEPCO Asset Management System. This is your personalised dashboard! Last Updated: June 2025 | v1.0.16';
        $settings->dash_chart_type = 'type';
        $settings->alert_interval = 30;
        
        // Save all settings
        $settings->save();

        if ($user = User::where('username', '=', 'admin')->first()) {
            $user->locale = 'en-US';
            $user->save();
        }

        // Copy the logos from the img/demo directory
        Storage::disk('local_public')->put('neepco-logo.png', file_get_contents(public_path('img/demo/neepco-logo.png')));
        Storage::disk('local_public')->put('neepco-logo-lg.png', file_get_contents(public_path('img/demo/neepco-logo-lg.png')));
    }
}
