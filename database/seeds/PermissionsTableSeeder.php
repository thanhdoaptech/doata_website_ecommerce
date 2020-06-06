<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'product_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'product_category_create',
            ],
            [
                'id'    => '19',
                'title' => 'product_category_edit',
            ],
            [
                'id'    => '20',
                'title' => 'product_category_show',
            ],
            [
                'id'    => '21',
                'title' => 'product_category_delete',
            ],
            [
                'id'    => '22',
                'title' => 'product_category_access',
            ],
            [
                'id'    => '23',
                'title' => 'product_tag_create',
            ],
            [
                'id'    => '24',
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => '25',
                'title' => 'product_tag_show',
            ],
            [
                'id'    => '26',
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => '27',
                'title' => 'product_tag_access',
            ],
            [
                'id'    => '28',
                'title' => 'product_create',
            ],
            [
                'id'    => '29',
                'title' => 'product_edit',
            ],
            [
                'id'    => '30',
                'title' => 'product_show',
            ],
            [
                'id'    => '31',
                'title' => 'product_delete',
            ],
            [
                'id'    => '32',
                'title' => 'product_access',
            ],
            [
                'id'    => '33',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '34',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '35',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '36',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '37',
                'title' => 'content_management_access',
            ],
            [
                'id'    => '38',
                'title' => 'content_category_create',
            ],
            [
                'id'    => '39',
                'title' => 'content_category_edit',
            ],
            [
                'id'    => '40',
                'title' => 'content_category_show',
            ],
            [
                'id'    => '41',
                'title' => 'content_category_delete',
            ],
            [
                'id'    => '42',
                'title' => 'content_category_access',
            ],
            [
                'id'    => '43',
                'title' => 'content_tag_create',
            ],
            [
                'id'    => '44',
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => '45',
                'title' => 'content_tag_show',
            ],
            [
                'id'    => '46',
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => '47',
                'title' => 'content_tag_access',
            ],
            [
                'id'    => '48',
                'title' => 'content_page_create',
            ],
            [
                'id'    => '49',
                'title' => 'content_page_edit',
            ],
            [
                'id'    => '50',
                'title' => 'content_page_show',
            ],
            [
                'id'    => '51',
                'title' => 'content_page_delete',
            ],
            [
                'id'    => '52',
                'title' => 'content_page_access',
            ],
            [
                'id'    => '53',
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => '54',
                'title' => 'crm_status_create',
            ],
            [
                'id'    => '55',
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => '56',
                'title' => 'crm_status_show',
            ],
            [
                'id'    => '57',
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => '58',
                'title' => 'crm_status_access',
            ],
            [
                'id'    => '59',
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => '60',
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => '61',
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => '62',
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => '63',
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => '64',
                'title' => 'crm_note_create',
            ],
            [
                'id'    => '65',
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => '66',
                'title' => 'crm_note_show',
            ],
            [
                'id'    => '67',
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => '68',
                'title' => 'crm_note_access',
            ],
            [
                'id'    => '69',
                'title' => 'crm_document_create',
            ],
            [
                'id'    => '70',
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => '71',
                'title' => 'crm_document_show',
            ],
            [
                'id'    => '72',
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => '73',
                'title' => 'crm_document_access',
            ],
            [
                'id'    => '74',
                'title' => 'faq_management_access',
            ],
            [
                'id'    => '75',
                'title' => 'faq_category_create',
            ],
            [
                'id'    => '76',
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => '77',
                'title' => 'faq_category_show',
            ],
            [
                'id'    => '78',
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => '79',
                'title' => 'faq_category_access',
            ],
            [
                'id'    => '80',
                'title' => 'faq_question_create',
            ],
            [
                'id'    => '81',
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => '82',
                'title' => 'faq_question_show',
            ],
            [
                'id'    => '83',
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => '84',
                'title' => 'faq_question_access',
            ],
            [
                'id'    => '85',
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => '86',
                'title' => 'currency_create',
            ],
            [
                'id'    => '87',
                'title' => 'currency_edit',
            ],
            [
                'id'    => '88',
                'title' => 'currency_show',
            ],
            [
                'id'    => '89',
                'title' => 'currency_delete',
            ],
            [
                'id'    => '90',
                'title' => 'currency_access',
            ],
            [
                'id'    => '91',
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => '92',
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => '93',
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => '94',
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => '95',
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => '96',
                'title' => 'income_source_create',
            ],
            [
                'id'    => '97',
                'title' => 'income_source_edit',
            ],
            [
                'id'    => '98',
                'title' => 'income_source_show',
            ],
            [
                'id'    => '99',
                'title' => 'income_source_delete',
            ],
            [
                'id'    => '100',
                'title' => 'income_source_access',
            ],
            [
                'id'    => '101',
                'title' => 'client_status_create',
            ],
            [
                'id'    => '102',
                'title' => 'client_status_edit',
            ],
            [
                'id'    => '103',
                'title' => 'client_status_show',
            ],
            [
                'id'    => '104',
                'title' => 'client_status_delete',
            ],
            [
                'id'    => '105',
                'title' => 'client_status_access',
            ],
            [
                'id'    => '106',
                'title' => 'project_status_create',
            ],
            [
                'id'    => '107',
                'title' => 'project_status_edit',
            ],
            [
                'id'    => '108',
                'title' => 'project_status_show',
            ],
            [
                'id'    => '109',
                'title' => 'project_status_delete',
            ],
            [
                'id'    => '110',
                'title' => 'project_status_access',
            ],
            [
                'id'    => '111',
                'title' => 'client_management_access',
            ],
            [
                'id'    => '112',
                'title' => 'client_create',
            ],
            [
                'id'    => '113',
                'title' => 'client_edit',
            ],
            [
                'id'    => '114',
                'title' => 'client_show',
            ],
            [
                'id'    => '115',
                'title' => 'client_delete',
            ],
            [
                'id'    => '116',
                'title' => 'client_access',
            ],
            [
                'id'    => '117',
                'title' => 'project_create',
            ],
            [
                'id'    => '118',
                'title' => 'project_edit',
            ],
            [
                'id'    => '119',
                'title' => 'project_show',
            ],
            [
                'id'    => '120',
                'title' => 'project_delete',
            ],
            [
                'id'    => '121',
                'title' => 'project_access',
            ],
            [
                'id'    => '122',
                'title' => 'note_create',
            ],
            [
                'id'    => '123',
                'title' => 'note_edit',
            ],
            [
                'id'    => '124',
                'title' => 'note_show',
            ],
            [
                'id'    => '125',
                'title' => 'note_delete',
            ],
            [
                'id'    => '126',
                'title' => 'note_access',
            ],
            [
                'id'    => '127',
                'title' => 'document_create',
            ],
            [
                'id'    => '128',
                'title' => 'document_edit',
            ],
            [
                'id'    => '129',
                'title' => 'document_show',
            ],
            [
                'id'    => '130',
                'title' => 'document_delete',
            ],
            [
                'id'    => '131',
                'title' => 'document_access',
            ],
            [
                'id'    => '132',
                'title' => 'transaction_create',
            ],
            [
                'id'    => '133',
                'title' => 'transaction_edit',
            ],
            [
                'id'    => '134',
                'title' => 'transaction_show',
            ],
            [
                'id'    => '135',
                'title' => 'transaction_delete',
            ],
            [
                'id'    => '136',
                'title' => 'transaction_access',
            ],
            [
                'id'    => '137',
                'title' => 'client_report_create',
            ],
            [
                'id'    => '138',
                'title' => 'client_report_edit',
            ],
            [
                'id'    => '139',
                'title' => 'client_report_show',
            ],
            [
                'id'    => '140',
                'title' => 'client_report_delete',
            ],
            [
                'id'    => '141',
                'title' => 'client_report_access',
            ],
            [
                'id'    => '142',
                'title' => 'course_create',
            ],
            [
                'id'    => '143',
                'title' => 'course_edit',
            ],
            [
                'id'    => '144',
                'title' => 'course_show',
            ],
            [
                'id'    => '145',
                'title' => 'course_delete',
            ],
            [
                'id'    => '146',
                'title' => 'course_access',
            ],
            [
                'id'    => '147',
                'title' => 'lesson_create',
            ],
            [
                'id'    => '148',
                'title' => 'lesson_edit',
            ],
            [
                'id'    => '149',
                'title' => 'lesson_show',
            ],
            [
                'id'    => '150',
                'title' => 'lesson_delete',
            ],
            [
                'id'    => '151',
                'title' => 'lesson_access',
            ],
            [
                'id'    => '152',
                'title' => 'test_create',
            ],
            [
                'id'    => '153',
                'title' => 'test_edit',
            ],
            [
                'id'    => '154',
                'title' => 'test_show',
            ],
            [
                'id'    => '155',
                'title' => 'test_delete',
            ],
            [
                'id'    => '156',
                'title' => 'test_access',
            ],
            [
                'id'    => '157',
                'title' => 'question_create',
            ],
            [
                'id'    => '158',
                'title' => 'question_edit',
            ],
            [
                'id'    => '159',
                'title' => 'question_show',
            ],
            [
                'id'    => '160',
                'title' => 'question_delete',
            ],
            [
                'id'    => '161',
                'title' => 'question_access',
            ],
            [
                'id'    => '162',
                'title' => 'question_option_create',
            ],
            [
                'id'    => '163',
                'title' => 'question_option_edit',
            ],
            [
                'id'    => '164',
                'title' => 'question_option_show',
            ],
            [
                'id'    => '165',
                'title' => 'question_option_delete',
            ],
            [
                'id'    => '166',
                'title' => 'question_option_access',
            ],
            [
                'id'    => '167',
                'title' => 'test_result_create',
            ],
            [
                'id'    => '168',
                'title' => 'test_result_edit',
            ],
            [
                'id'    => '169',
                'title' => 'test_result_show',
            ],
            [
                'id'    => '170',
                'title' => 'test_result_delete',
            ],
            [
                'id'    => '171',
                'title' => 'test_result_access',
            ],
            [
                'id'    => '172',
                'title' => 'test_answer_create',
            ],
            [
                'id'    => '173',
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => '174',
                'title' => 'test_answer_show',
            ],
            [
                'id'    => '175',
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => '176',
                'title' => 'test_answer_access',
            ],
            [
                'id'    => '177',
                'title' => 'time_management_access',
            ],
            [
                'id'    => '178',
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => '179',
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => '180',
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => '181',
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => '182',
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => '183',
                'title' => 'time_project_create',
            ],
            [
                'id'    => '184',
                'title' => 'time_project_edit',
            ],
            [
                'id'    => '185',
                'title' => 'time_project_show',
            ],
            [
                'id'    => '186',
                'title' => 'time_project_delete',
            ],
            [
                'id'    => '187',
                'title' => 'time_project_access',
            ],
            [
                'id'    => '188',
                'title' => 'time_entry_create',
            ],
            [
                'id'    => '189',
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => '190',
                'title' => 'time_entry_show',
            ],
            [
                'id'    => '191',
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => '192',
                'title' => 'time_entry_access',
            ],
            [
                'id'    => '193',
                'title' => 'time_report_create',
            ],
            [
                'id'    => '194',
                'title' => 'time_report_edit',
            ],
            [
                'id'    => '195',
                'title' => 'time_report_show',
            ],
            [
                'id'    => '196',
                'title' => 'time_report_delete',
            ],
            [
                'id'    => '197',
                'title' => 'time_report_access',
            ],
            [
                'id'    => '198',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '199',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '200',
                'title' => 'task_management_access',
            ],
            [
                'id'    => '201',
                'title' => 'task_status_create',
            ],
            [
                'id'    => '202',
                'title' => 'task_status_edit',
            ],
            [
                'id'    => '203',
                'title' => 'task_status_show',
            ],
            [
                'id'    => '204',
                'title' => 'task_status_delete',
            ],
            [
                'id'    => '205',
                'title' => 'task_status_access',
            ],
            [
                'id'    => '206',
                'title' => 'task_tag_create',
            ],
            [
                'id'    => '207',
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => '208',
                'title' => 'task_tag_show',
            ],
            [
                'id'    => '209',
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => '210',
                'title' => 'task_tag_access',
            ],
            [
                'id'    => '211',
                'title' => 'task_create',
            ],
            [
                'id'    => '212',
                'title' => 'task_edit',
            ],
            [
                'id'    => '213',
                'title' => 'task_show',
            ],
            [
                'id'    => '214',
                'title' => 'task_delete',
            ],
            [
                'id'    => '215',
                'title' => 'task_access',
            ],
            [
                'id'    => '216',
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => '217',
                'title' => 'asset_management_access',
            ],
            [
                'id'    => '218',
                'title' => 'asset_category_create',
            ],
            [
                'id'    => '219',
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => '220',
                'title' => 'asset_category_show',
            ],
            [
                'id'    => '221',
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => '222',
                'title' => 'asset_category_access',
            ],
            [
                'id'    => '223',
                'title' => 'asset_location_create',
            ],
            [
                'id'    => '224',
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => '225',
                'title' => 'asset_location_show',
            ],
            [
                'id'    => '226',
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => '227',
                'title' => 'asset_location_access',
            ],
            [
                'id'    => '228',
                'title' => 'asset_status_create',
            ],
            [
                'id'    => '229',
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => '230',
                'title' => 'asset_status_show',
            ],
            [
                'id'    => '231',
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => '232',
                'title' => 'asset_status_access',
            ],
            [
                'id'    => '233',
                'title' => 'asset_create',
            ],
            [
                'id'    => '234',
                'title' => 'asset_edit',
            ],
            [
                'id'    => '235',
                'title' => 'asset_show',
            ],
            [
                'id'    => '236',
                'title' => 'asset_delete',
            ],
            [
                'id'    => '237',
                'title' => 'asset_access',
            ],
            [
                'id'    => '238',
                'title' => 'assets_history_access',
            ],
            [
                'id'    => '239',
                'title' => 'contact_management_access',
            ],
            [
                'id'    => '240',
                'title' => 'contact_company_create',
            ],
            [
                'id'    => '241',
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => '242',
                'title' => 'contact_company_show',
            ],
            [
                'id'    => '243',
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => '244',
                'title' => 'contact_company_access',
            ],
            [
                'id'    => '245',
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => '246',
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => '247',
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => '248',
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => '249',
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => '250',
                'title' => 'expense_management_access',
            ],
            [
                'id'    => '251',
                'title' => 'expense_category_create',
            ],
            [
                'id'    => '252',
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => '253',
                'title' => 'expense_category_show',
            ],
            [
                'id'    => '254',
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => '255',
                'title' => 'expense_category_access',
            ],
            [
                'id'    => '256',
                'title' => 'income_category_create',
            ],
            [
                'id'    => '257',
                'title' => 'income_category_edit',
            ],
            [
                'id'    => '258',
                'title' => 'income_category_show',
            ],
            [
                'id'    => '259',
                'title' => 'income_category_delete',
            ],
            [
                'id'    => '260',
                'title' => 'income_category_access',
            ],
            [
                'id'    => '261',
                'title' => 'expense_create',
            ],
            [
                'id'    => '262',
                'title' => 'expense_edit',
            ],
            [
                'id'    => '263',
                'title' => 'expense_show',
            ],
            [
                'id'    => '264',
                'title' => 'expense_delete',
            ],
            [
                'id'    => '265',
                'title' => 'expense_access',
            ],
            [
                'id'    => '266',
                'title' => 'income_create',
            ],
            [
                'id'    => '267',
                'title' => 'income_edit',
            ],
            [
                'id'    => '268',
                'title' => 'income_show',
            ],
            [
                'id'    => '269',
                'title' => 'income_delete',
            ],
            [
                'id'    => '270',
                'title' => 'income_access',
            ],
            [
                'id'    => '271',
                'title' => 'expense_report_create',
            ],
            [
                'id'    => '272',
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => '273',
                'title' => 'expense_report_show',
            ],
            [
                'id'    => '274',
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => '275',
                'title' => 'expense_report_access',
            ],
            [
                'id'    => '276',
                'title' => 'location_create',
            ],
            [
                'id'    => '277',
                'title' => 'location_edit',
            ],
            [
                'id'    => '278',
                'title' => 'location_show',
            ],
            [
                'id'    => '279',
                'title' => 'location_delete',
            ],
            [
                'id'    => '280',
                'title' => 'location_access',
            ],
            [
                'id'    => '281',
                'title' => 'image_create',
            ],
            [
                'id'    => '282',
                'title' => 'image_edit',
            ],
            [
                'id'    => '283',
                'title' => 'image_show',
            ],
            [
                'id'    => '284',
                'title' => 'image_delete',
            ],
            [
                'id'    => '285',
                'title' => 'image_access',
            ],
            [
                'id'    => '286',
                'title' => 'order_create',
            ],
            [
                'id'    => '287',
                'title' => 'order_edit',
            ],
            [
                'id'    => '288',
                'title' => 'order_show',
            ],
            [
                'id'    => '289',
                'title' => 'order_delete',
            ],
            [
                'id'    => '290',
                'title' => 'order_access',
            ],
            [
                'id'    => '291',
                'title' => 'order_detail_create',
            ],
            [
                'id'    => '292',
                'title' => 'order_detail_edit',
            ],
            [
                'id'    => '293',
                'title' => 'order_detail_show',
            ],
            [
                'id'    => '294',
                'title' => 'order_detail_delete',
            ],
            [
                'id'    => '295',
                'title' => 'order_detail_access',
            ],
            [
                'id'    => '296',
                'title' => 'option_create',
            ],
            [
                'id'    => '297',
                'title' => 'option_edit',
            ],
            [
                'id'    => '298',
                'title' => 'option_show',
            ],
            [
                'id'    => '299',
                'title' => 'option_delete',
            ],
            [
                'id'    => '300',
                'title' => 'option_access',
            ],
            [
                'id'    => '301',
                'title' => 'product_option_create',
            ],
            [
                'id'    => '302',
                'title' => 'product_option_edit',
            ],
            [
                'id'    => '303',
                'title' => 'product_option_show',
            ],
            [
                'id'    => '304',
                'title' => 'product_option_delete',
            ],
            [
                'id'    => '305',
                'title' => 'product_option_access',
            ],
            [
                'id'    => '306',
                'title' => 'option_group_create',
            ],
            [
                'id'    => '307',
                'title' => 'option_group_edit',
            ],
            [
                'id'    => '308',
                'title' => 'option_group_show',
            ],
            [
                'id'    => '309',
                'title' => 'option_group_delete',
            ],
            [
                'id'    => '310',
                'title' => 'option_group_access',
            ],
            [
                'id'    => '311',
                'title' => 'customer_support_create',
            ],
            [
                'id'    => '312',
                'title' => 'customer_support_edit',
            ],
            [
                'id'    => '313',
                'title' => 'customer_support_show',
            ],
            [
                'id'    => '314',
                'title' => 'customer_support_delete',
            ],
            [
                'id'    => '315',
                'title' => 'customer_support_access',
            ],
            [
                'id'    => '316',
                'title' => 'slide_type_create',
            ],
            [
                'id'    => '317',
                'title' => 'slide_type_edit',
            ],
            [
                'id'    => '318',
                'title' => 'slide_type_show',
            ],
            [
                'id'    => '319',
                'title' => 'slide_type_delete',
            ],
            [
                'id'    => '320',
                'title' => 'slide_type_access',
            ],
            [
                'id'    => '321',
                'title' => 'slide_management_access',
            ],
            [
                'id'    => '322',
                'title' => 'slide_create',
            ],
            [
                'id'    => '323',
                'title' => 'slide_edit',
            ],
            [
                'id'    => '324',
                'title' => 'slide_show',
            ],
            [
                'id'    => '325',
                'title' => 'slide_delete',
            ],
            [
                'id'    => '326',
                'title' => 'slide_access',
            ],
            [
                'id'    => '327',
                'title' => 'customer_support_management_access',
            ],
            [
                'id'    => '328',
                'title' => 'order_management_access',
            ],
            [
                'id'    => '329',
                'title' => 'location_management_access',
            ],
            [
                'id'    => '330',
                'title' => 'menu_management_access',
            ],
            [
                'id'    => '331',
                'title' => 'top_menu_create',
            ],
            [
                'id'    => '332',
                'title' => 'top_menu_edit',
            ],
            [
                'id'    => '333',
                'title' => 'top_menu_show',
            ],
            [
                'id'    => '334',
                'title' => 'top_menu_delete',
            ],
            [
                'id'    => '335',
                'title' => 'top_menu_access',
            ],
            [
                'id'    => '336',
                'title' => 'footer_menu_create',
            ],
            [
                'id'    => '337',
                'title' => 'footer_menu_edit',
            ],
            [
                'id'    => '338',
                'title' => 'footer_menu_show',
            ],
            [
                'id'    => '339',
                'title' => 'footer_menu_delete',
            ],
            [
                'id'    => '340',
                'title' => 'footer_menu_access',
            ],
            [
                'id'    => '341',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
