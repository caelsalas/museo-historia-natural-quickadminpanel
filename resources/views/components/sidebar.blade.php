<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>



            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('header_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/headers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.headers.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-images">
                            </i>
                            {{ trans('cruds.header.title') }}
                        </a>
                    </li>
                @endcan
                @can('section_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/home-sections*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon far fa-file">
                            </i>
                            {{ trans('cruds.section.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('home_section_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/home-sections*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.home-sections.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-home">
                                        </i>
                                        {{ trans('cruds.homeSection.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('subscription_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/subscriptions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.subscriptions.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-envelope">
                            </i>
                            {{ trans('cruds.subscription.title') }}
                        </a>
                    </li>
                @endcan
                @can('information_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/informations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.informations.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-info">
                            </i>
                            {{ trans('cruds.information.title') }}
                        </a>
                    </li>
                @endcan
                @can('exhibition_room_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/exhibition-rooms*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.exhibition-rooms.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                            </i>
                            {{ trans('cruds.exhibitionRoom.title') }}
                        </a>
                    </li>
                @endcan
                @can('tour_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/tours*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tours.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-eye">
                            </i>
                            {{ trans('cruds.tour.title') }}
                        </a>
                    </li>
                @endcan
                @can('virtual_tour_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/virtual-tours*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.virtual-tours.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-desktop">
                            </i>
                            {{ trans('cruds.virtualTour.title') }}
                        </a>
                    </li>
                @endcan
                @can('workshop_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/workshops*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.workshops.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user-lock">
                            </i>
                            {{ trans('cruds.workshop.title') }}
                        </a>
                    </li>
                @endcan
                @can('birthday_package_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/birthday-packages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.birthday-packages.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.birthdayPackage.title') }}
                        </a>
                    </li>
                @endcan
                @can('event_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/event-types*")||request()->is("admin/event-audiences*")||request()->is("admin/event-modalities*")||request()->is("admin/event-costs*")||request()->is("admin/events*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-circle">
                            </i>
                            {{ trans('cruds.eventManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('event_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/event-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.event-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                                        </i>
                                        {{ trans('cruds.eventType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('event_audience_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/event-audiences*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.event-audiences.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                                        </i>
                                        {{ trans('cruds.eventAudience.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('event_modality_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/event-modalities*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.event-modalities.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                                        </i>
                                        {{ trans('cruds.eventModality.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('event_cost_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/event-costs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.event-costs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-dollar-sign">
                                        </i>
                                        {{ trans('cruds.eventCost.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('event_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/events*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.events.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                                        </i>
                                        {{ trans('cruds.event.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('publication_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/publication-specialties*")||request()->is("admin/publications*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-circle">
                            </i>
                            {{ trans('cruds.publicationManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('publication_specialty_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/publication-specialties*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.publication-specialties.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                                        </i>
                                        {{ trans('cruds.publicationSpecialty.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('publication_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/publications*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.publications.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                                        </i>
                                        {{ trans('cruds.publication.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('article_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/articles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.articles.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-newspaper">
                            </i>
                            {{ trans('cruds.article.title') }}
                        </a>
                    </li>
                @endcan
                @can('collection_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/collections*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.collections.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-circle">
                            </i>
                            {{ trans('cruds.collection.title') }}
                        </a>
                    </li>
                @endcan
                @can('store_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/stores*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.stores.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-store-alt">
                            </i>
                            {{ trans('cruds.store.title') }}
                        </a>
                    </li>
                @endcan
                @can('education_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/education-categories*")||request()->is("admin/educations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-graduation-cap">
                            </i>
                            {{ trans('cruds.educationManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('education_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/education-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.education-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-object-group">
                                        </i>
                                        {{ trans('cruds.educationCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('education_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/educations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.educations.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-graduation-cap">
                                        </i>
                                        {{ trans('cruds.education.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contact_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contacts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-envelope">
                            </i>
                            {{ trans('cruds.contact.title') }}
                        </a>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>