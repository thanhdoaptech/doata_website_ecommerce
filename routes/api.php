<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Content Categories
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tags
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Pages
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Crm Statuses
    Route::apiResource('crm-statuses', 'CrmStatusApiController');

    // Crm Customers
    Route::apiResource('crm-customers', 'CrmCustomerApiController');

    // Crm Notes
    Route::apiResource('crm-notes', 'CrmNoteApiController');

    // Crm Documents
    Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
    Route::apiResource('crm-documents', 'CrmDocumentApiController');

    // Faq Categories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrencyApiController');

    // Transaction Types
    Route::apiResource('transaction-types', 'TransactionTypeApiController');

    // Income Sources
    Route::apiResource('income-sources', 'IncomeSourceApiController');

    // Client Statuses
    Route::apiResource('client-statuses', 'ClientStatusApiController');

    // Project Statuses
    Route::apiResource('project-statuses', 'ProjectStatusApiController');

    // Clients
    Route::apiResource('clients', 'ClientApiController');

    // Projects
    Route::apiResource('projects', 'ProjectApiController');

    // Notes
    Route::apiResource('notes', 'NoteApiController');

    // Documents
    Route::post('documents/media', 'DocumentApiController@storeMedia')->name('documents.storeMedia');
    Route::apiResource('documents', 'DocumentApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::apiResource('lessons', 'LessonsApiController');

    // Tests
    Route::apiResource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionsApiController');

    // Question Options
    Route::apiResource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::apiResource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::apiResource('test-answers', 'TestAnswersApiController');

    // Time Work Types
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Projects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Task Statuses
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tags
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Tasks
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Asset Categories
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Asset Locations
    Route::apiResource('asset-locations', 'AssetLocationApiController');

    // Asset Statuses
    Route::apiResource('asset-statuses', 'AssetStatusApiController');

    // Assets
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');

    // Assets Histories
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Contact Companies
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // Expense Categories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Categories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Locations
    Route::apiResource('locations', 'LocationApiController');

    // Images
    Route::post('images/media', 'ImagesApiController@storeMedia')->name('images.storeMedia');
    Route::apiResource('images', 'ImagesApiController');

    // Orders
    Route::apiResource('orders', 'OrdersApiController');

    // Order Details
    Route::apiResource('order-details', 'OrderDetailApiController');

    // Options
    Route::apiResource('options', 'OptionApiController');

    // Product Options
    Route::apiResource('product-options', 'ProductOptionApiController');

    // Option Groups
    Route::apiResource('option-groups', 'OptionGroupApiController');

    // Customer Supports
    Route::post('customer-supports/media', 'CustomerSupportApiController@storeMedia')->name('customer-supports.storeMedia');
    Route::apiResource('customer-supports', 'CustomerSupportApiController');

    // Slide Types
    Route::apiResource('slide-types', 'SlideTypeApiController');

    // Slides
    Route::post('slides/media', 'SlideApiController@storeMedia')->name('slides.storeMedia');
    Route::apiResource('slides', 'SlideApiController');

    // Top Menus
    Route::post('top-menus/media', 'TopMenuApiController@storeMedia')->name('top-menus.storeMedia');
    Route::apiResource('top-menus', 'TopMenuApiController');

    // Footer Menus
    Route::post('footer-menus/media', 'FooterMenuApiController@storeMedia')->name('footer-menus.storeMedia');
    Route::apiResource('footer-menus', 'FooterMenuApiController');
});
