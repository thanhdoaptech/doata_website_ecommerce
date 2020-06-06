<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-shopping-cart nav-icon">

                        </i>
                        {{ trans('cruds.productManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('product_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-categories.index") }}" class="nav-link {{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-bars nav-icon">

                                    </i>
                                    {{ trans('cruds.productCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-tags.index") }}" class="nav-link {{ request()->is('admin/product-tags') || request()->is('admin/product-tags/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-tag nav-icon">

                                    </i>
                                    {{ trans('cruds.productTag.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-shopping-cart nav-icon">

                                    </i>
                                    {{ trans('cruds.product.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('image_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.images.index") }}" class="nav-link {{ request()->is('admin/images') || request()->is('admin/images/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-image nav-icon">

                                    </i>
                                    {{ trans('cruds.image.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('option_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.options.index") }}" class="nav-link {{ request()->is('admin/options') || request()->is('admin/options/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-filter nav-icon">

                                    </i>
                                    {{ trans('cruds.option.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('product_option_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.product-options.index") }}" class="nav-link {{ request()->is('admin/product-options') || request()->is('admin/product-options/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-filter nav-icon">

                                    </i>
                                    {{ trans('cruds.productOption.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('option_group_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.option-groups.index") }}" class="nav-link {{ request()->is('admin/option-groups') || request()->is('admin/option-groups/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.optionGroup.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('order_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-luggage-cart nav-icon">

                        </i>
                        {{ trans('cruds.orderManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('order_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.orders.index") }}" class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-shopping-cart nav-icon">

                                    </i>
                                    {{ trans('cruds.order.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('order_detail_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.order-details.index") }}" class="nav-link {{ request()->is('admin/order-details') || request()->is('admin/order-details/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-shopping-cart nav-icon">

                                    </i>
                                    {{ trans('cruds.orderDetail.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('menu_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-bars nav-icon">

                        </i>
                        {{ trans('cruds.menuManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('top_menu_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.top-menus.index") }}" class="nav-link {{ request()->is('admin/top-menus') || request()->is('admin/top-menus/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.topMenu.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('footer_menu_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.footer-menus.index") }}" class="nav-link {{ request()->is('admin/footer-menus') || request()->is('admin/footer-menus/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-ellipsis-h nav-icon">

                                    </i>
                                    {{ trans('cruds.footerMenu.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('slide_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw far fa-images nav-icon">

                        </i>
                        {{ trans('cruds.slideManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('slide_type_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.slide-types.index") }}" class="nav-link {{ request()->is('admin/slide-types') || request()->is('admin/slide-types/*') ? 'active' : '' }}">
                                    <i class="fa-fw fab fa-slideshare nav-icon">

                                    </i>
                                    {{ trans('cruds.slideType.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('slide_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.slides.index") }}" class="nav-link {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-images nav-icon">

                                    </i>
                                    {{ trans('cruds.slide.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('customer_support_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-ambulance nav-icon">

                        </i>
                        {{ trans('cruds.customerSupportManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('customer_support_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.customer-supports.index") }}" class="nav-link {{ request()->is('admin/customer-supports') || request()->is('admin/customer-supports/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-ambulance nav-icon">

                                    </i>
                                    {{ trans('cruds.customerSupport.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('location_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-map-marked nav-icon">

                        </i>
                        {{ trans('cruds.locationManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('location_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.locations.index") }}" class="nav-link {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-map nav-icon">

                                    </i>
                                    {{ trans('cruds.location.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="nav-item">
                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-bell nav-icon">

                        </i>
                        {{ trans('cruds.userAlert.title') }}
                    </a>
                </li>
            @endcan
            @can('content_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-book nav-icon">

                        </i>
                        {{ trans('cruds.contentManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('content_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-folder nav-icon">

                                    </i>
                                    {{ trans('cruds.contentCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('content_tag_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-tags nav-icon">

                                    </i>
                                    {{ trans('cruds.contentTag.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('content_page_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file nav-icon">

                                    </i>
                                    {{ trans('cruds.contentPage.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('basic_c_r_m_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.basicCRM.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('crm_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-statuses.index") }}" class="nav-link {{ request()->is('admin/crm-statuses') || request()->is('admin/crm-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-folder nav-icon">

                                    </i>
                                    {{ trans('cruds.crmStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_customer_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-customers.index") }}" class="nav-link {{ request()->is('admin/crm-customers') || request()->is('admin/crm-customers/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-plus nav-icon">

                                    </i>
                                    {{ trans('cruds.crmCustomer.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_note_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-notes.index") }}" class="nav-link {{ request()->is('admin/crm-notes') || request()->is('admin/crm-notes/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-sticky-note nav-icon">

                                    </i>
                                    {{ trans('cruds.crmNote.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('crm_document_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.crm-documents.index") }}" class="nav-link {{ request()->is('admin/crm-documents') || request()->is('admin/crm-documents/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-folder nav-icon">

                                    </i>
                                    {{ trans('cruds.crmDocument.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('faq_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-question nav-icon">

                        </i>
                        {{ trans('cruds.faqManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('faq_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is('admin/faq-categories') || request()->is('admin/faq-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.faqCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('faq_question_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is('admin/faq-questions') || request()->is('admin/faq-questions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-question nav-icon">

                                    </i>
                                    {{ trans('cruds.faqQuestion.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_management_setting_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cog nav-icon">

                        </i>
                        {{ trans('cruds.clientManagementSetting.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('currency_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.currencies.index") }}" class="nav-link {{ request()->is('admin/currencies') || request()->is('admin/currencies/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-money-bill nav-icon">

                                    </i>
                                    {{ trans('cruds.currency.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('transaction_type_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.transaction-types.index") }}" class="nav-link {{ request()->is('admin/transaction-types') || request()->is('admin/transaction-types/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-money-check nav-icon">

                                    </i>
                                    {{ trans('cruds.transactionType.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('income_source_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.income-sources.index") }}" class="nav-link {{ request()->is('admin/income-sources') || request()->is('admin/income-sources/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-database nav-icon">

                                    </i>
                                    {{ trans('cruds.incomeSource.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('client_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.client-statuses.index") }}" class="nav-link {{ request()->is('admin/client-statuses') || request()->is('admin/client-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    {{ trans('cruds.clientStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('project_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.project-statuses.index") }}" class="nav-link {{ request()->is('admin/project-statuses') || request()->is('admin/project-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    {{ trans('cruds.projectStatus.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-briefcase nav-icon">

                        </i>
                        {{ trans('cruds.clientManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('client_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-plus nav-icon">

                                    </i>
                                    {{ trans('cruds.client.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('project_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.project.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('note_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.notes.index") }}" class="nav-link {{ request()->is('admin/notes') || request()->is('admin/notes/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-sticky-note nav-icon">

                                    </i>
                                    {{ trans('cruds.note.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('document_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.document.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('transaction_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-credit-card nav-icon">

                                    </i>
                                    {{ trans('cruds.transaction.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('client_report_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.client-reports.index") }}" class="nav-link {{ request()->is('admin/client-reports') || request()->is('admin/client-reports/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-chart-line nav-icon">

                                    </i>
                                    {{ trans('cruds.clientReport.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('course_access')
                <li class="nav-item">
                    <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.course.title') }}
                    </a>
                </li>
            @endcan
            @can('lesson_access')
                <li class="nav-item">
                    <a href="{{ route("admin.lessons.index") }}" class="nav-link {{ request()->is('admin/lessons') || request()->is('admin/lessons/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.lesson.title') }}
                    </a>
                </li>
            @endcan
            @can('test_access')
                <li class="nav-item">
                    <a href="{{ route("admin.tests.index") }}" class="nav-link {{ request()->is('admin/tests') || request()->is('admin/tests/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.test.title') }}
                    </a>
                </li>
            @endcan
            @can('question_access')
                <li class="nav-item">
                    <a href="{{ route("admin.questions.index") }}" class="nav-link {{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.question.title') }}
                    </a>
                </li>
            @endcan
            @can('question_option_access')
                <li class="nav-item">
                    <a href="{{ route("admin.question-options.index") }}" class="nav-link {{ request()->is('admin/question-options') || request()->is('admin/question-options/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.questionOption.title') }}
                    </a>
                </li>
            @endcan
            @can('test_result_access')
                <li class="nav-item">
                    <a href="{{ route("admin.test-results.index") }}" class="nav-link {{ request()->is('admin/test-results') || request()->is('admin/test-results/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.testResult.title') }}
                    </a>
                </li>
            @endcan
            @can('test_answer_access')
                <li class="nav-item">
                    <a href="{{ route("admin.test-answers.index") }}" class="nav-link {{ request()->is('admin/test-answers') || request()->is('admin/test-answers/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.testAnswer.title') }}
                    </a>
                </li>
            @endcan
            @can('time_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-clock nav-icon">

                        </i>
                        {{ trans('cruds.timeManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('time_work_type_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-work-types.index") }}" class="nav-link {{ request()->is('admin/time-work-types') || request()->is('admin/time-work-types/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-th nav-icon">

                                    </i>
                                    {{ trans('cruds.timeWorkType.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-projects.index") }}" class="nav-link {{ request()->is('admin/time-projects') || request()->is('admin/time-projects/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.timeProject.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('time_entry_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-entries.index") }}" class="nav-link {{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.timeEntry.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-reports.index") }}" class="nav-link {{ request()->is('admin/time-reports') || request()->is('admin/time-reports/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-chart-line nav-icon">

                                    </i>
                                    {{ trans('cruds.timeReport.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('task_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        {{ trans('cruds.taskManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('task_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    {{ trans('cruds.taskStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('task_tag_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.task-tags.index") }}" class="nav-link {{ request()->is('admin/task-tags') || request()->is('admin/task-tags/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    {{ trans('cruds.taskTag.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.task.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('tasks_calendar_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is('admin/tasks-calendars') || request()->is('admin/tasks-calendars/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-calendar nav-icon">

                                    </i>
                                    {{ trans('cruds.tasksCalendar.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('asset_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-book nav-icon">

                        </i>
                        {{ trans('cruds.assetManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('asset_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.asset-categories.index") }}" class="nav-link {{ request()->is('admin/asset-categories') || request()->is('admin/asset-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-tags nav-icon">

                                    </i>
                                    {{ trans('cruds.assetCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('asset_location_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.asset-locations.index") }}" class="nav-link {{ request()->is('admin/asset-locations') || request()->is('admin/asset-locations/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-map-marker nav-icon">

                                    </i>
                                    {{ trans('cruds.assetLocation.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('asset_status_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.asset-statuses.index") }}" class="nav-link {{ request()->is('admin/asset-statuses') || request()->is('admin/asset-statuses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    {{ trans('cruds.assetStatus.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('asset_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.assets.index") }}" class="nav-link {{ request()->is('admin/assets') || request()->is('admin/assets/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-book nav-icon">

                                    </i>
                                    {{ trans('cruds.asset.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('assets_history_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.assets-histories.index") }}" class="nav-link {{ request()->is('admin/assets-histories') || request()->is('admin/assets-histories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-th-list nav-icon">

                                    </i>
                                    {{ trans('cruds.assetsHistory.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('contact_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-phone-square nav-icon">

                        </i>
                        {{ trans('cruds.contactManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('contact_company_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.contact-companies.index") }}" class="nav-link {{ request()->is('admin/contact-companies') || request()->is('admin/contact-companies/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-building nav-icon">

                                    </i>
                                    {{ trans('cruds.contactCompany.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('contact_contact_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.contact-contacts.index") }}" class="nav-link {{ request()->is('admin/contact-contacts') || request()->is('admin/contact-contacts/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-plus nav-icon">

                                    </i>
                                    {{ trans('cruds.contactContact.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('expense_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-money-bill nav-icon">

                        </i>
                        {{ trans('cruds.expenseManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('expense_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.expense-categories.index") }}" class="nav-link {{ request()->is('admin/expense-categories') || request()->is('admin/expense-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-list nav-icon">

                                    </i>
                                    {{ trans('cruds.expenseCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('income_category_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.income-categories.index") }}" class="nav-link {{ request()->is('admin/income-categories') || request()->is('admin/income-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-list nav-icon">

                                    </i>
                                    {{ trans('cruds.incomeCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('expense_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-arrow-circle-right nav-icon">

                                    </i>
                                    {{ trans('cruds.expense.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('income_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-arrow-circle-right nav-icon">

                                    </i>
                                    {{ trans('cruds.income.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('expense_report_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.expense-reports.index") }}" class="nav-link {{ request()->is('admin/expense-reports') || request()->is('admin/expense-reports/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-chart-line nav-icon">

                                    </i>
                                    {{ trans('cruds.expenseReport.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                    <i class="nav-icon fa-fw fas fa-calendar">

                    </i>
                    {{ trans('global.systemCalendar') }}
                </a>
            </li>
            @php($unread = \App\QaTopic::unreadCount())
                <li class="nav-item">
                    <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }} nav-link">
                        <i class="nav-icon fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif
                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>