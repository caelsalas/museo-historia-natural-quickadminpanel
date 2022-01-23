<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'header_create',
            ],
            [
                'id'    => 19,
                'title' => 'header_edit',
            ],
            [
                'id'    => 20,
                'title' => 'header_show',
            ],
            [
                'id'    => 21,
                'title' => 'header_delete',
            ],
            [
                'id'    => 22,
                'title' => 'header_access',
            ],
            [
                'id'    => 23,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 24,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 25,
                'title' => 'exhibition_room_create',
            ],
            [
                'id'    => 26,
                'title' => 'exhibition_room_edit',
            ],
            [
                'id'    => 27,
                'title' => 'exhibition_room_delete',
            ],
            [
                'id'    => 28,
                'title' => 'exhibition_room_access',
            ],
            [
                'id'    => 29,
                'title' => 'tour_create',
            ],
            [
                'id'    => 30,
                'title' => 'tour_edit',
            ],
            [
                'id'    => 31,
                'title' => 'tour_delete',
            ],
            [
                'id'    => 32,
                'title' => 'tour_access',
            ],
            [
                'id'    => 33,
                'title' => 'virtual_tour_create',
            ],
            [
                'id'    => 34,
                'title' => 'virtual_tour_edit',
            ],
            [
                'id'    => 35,
                'title' => 'virtual_tour_delete',
            ],
            [
                'id'    => 36,
                'title' => 'virtual_tour_access',
            ],
            [
                'id'    => 37,
                'title' => 'workshop_create',
            ],
            [
                'id'    => 38,
                'title' => 'workshop_edit',
            ],
            [
                'id'    => 39,
                'title' => 'workshop_delete',
            ],
            [
                'id'    => 40,
                'title' => 'workshop_access',
            ],
            [
                'id'    => 41,
                'title' => 'event_create',
            ],
            [
                'id'    => 42,
                'title' => 'event_edit',
            ],
            [
                'id'    => 43,
                'title' => 'event_delete',
            ],
            [
                'id'    => 44,
                'title' => 'event_access',
            ],
            [
                'id'    => 45,
                'title' => 'publication_create',
            ],
            [
                'id'    => 46,
                'title' => 'publication_edit',
            ],
            [
                'id'    => 47,
                'title' => 'publication_delete',
            ],
            [
                'id'    => 48,
                'title' => 'publication_access',
            ],
            [
                'id'    => 49,
                'title' => 'article_create',
            ],
            [
                'id'    => 50,
                'title' => 'article_edit',
            ],
            [
                'id'    => 51,
                'title' => 'article_delete',
            ],
            [
                'id'    => 52,
                'title' => 'article_access',
            ],
            [
                'id'    => 53,
                'title' => 'collection_create',
            ],
            [
                'id'    => 54,
                'title' => 'collection_edit',
            ],
            [
                'id'    => 55,
                'title' => 'collection_delete',
            ],
            [
                'id'    => 56,
                'title' => 'collection_access',
            ],
            [
                'id'    => 57,
                'title' => 'store_create',
            ],
            [
                'id'    => 58,
                'title' => 'store_edit',
            ],
            [
                'id'    => 59,
                'title' => 'store_delete',
            ],
            [
                'id'    => 60,
                'title' => 'store_access',
            ],
            [
                'id'    => 61,
                'title' => 'education_category_create',
            ],
            [
                'id'    => 62,
                'title' => 'education_category_edit',
            ],
            [
                'id'    => 63,
                'title' => 'education_category_delete',
            ],
            [
                'id'    => 64,
                'title' => 'education_category_access',
            ],
            [
                'id'    => 65,
                'title' => 'education_create',
            ],
            [
                'id'    => 66,
                'title' => 'education_edit',
            ],
            [
                'id'    => 67,
                'title' => 'education_delete',
            ],
            [
                'id'    => 68,
                'title' => 'education_access',
            ],
            [
                'id'    => 69,
                'title' => 'education_management_access',
            ],
            [
                'id'    => 70,
                'title' => 'event_management_access',
            ],
            [
                'id'    => 71,
                'title' => 'event_type_create',
            ],
            [
                'id'    => 72,
                'title' => 'event_type_edit',
            ],
            [
                'id'    => 73,
                'title' => 'event_type_delete',
            ],
            [
                'id'    => 74,
                'title' => 'event_type_access',
            ],
            [
                'id'    => 75,
                'title' => 'event_audience_create',
            ],
            [
                'id'    => 76,
                'title' => 'event_audience_edit',
            ],
            [
                'id'    => 77,
                'title' => 'event_audience_delete',
            ],
            [
                'id'    => 78,
                'title' => 'event_audience_access',
            ],
            [
                'id'    => 79,
                'title' => 'event_modality_create',
            ],
            [
                'id'    => 80,
                'title' => 'event_modality_edit',
            ],
            [
                'id'    => 81,
                'title' => 'event_modality_delete',
            ],
            [
                'id'    => 82,
                'title' => 'event_modality_access',
            ],
            [
                'id'    => 83,
                'title' => 'event_cost_create',
            ],
            [
                'id'    => 84,
                'title' => 'event_cost_edit',
            ],
            [
                'id'    => 85,
                'title' => 'event_cost_delete',
            ],
            [
                'id'    => 86,
                'title' => 'event_cost_access',
            ],
            [
                'id'    => 87,
                'title' => 'publication_management_access',
            ],
            [
                'id'    => 88,
                'title' => 'publication_specialty_create',
            ],
            [
                'id'    => 89,
                'title' => 'publication_specialty_edit',
            ],
            [
                'id'    => 90,
                'title' => 'publication_specialty_delete',
            ],
            [
                'id'    => 91,
                'title' => 'publication_specialty_access',
            ],
            [
                'id'    => 92,
                'title' => 'contact_show',
            ],
            [
                'id'    => 93,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 94,
                'title' => 'contact_access',
            ],
            [
                'id'    => 95,
                'title' => 'birthday_package_create',
            ],
            [
                'id'    => 96,
                'title' => 'birthday_package_edit',
            ],
            [
                'id'    => 97,
                'title' => 'birthday_package_delete',
            ],
            [
                'id'    => 98,
                'title' => 'birthday_package_access',
            ],
            [
                'id'    => 99,
                'title' => 'information_create',
            ],
            [
                'id'    => 100,
                'title' => 'information_edit',
            ],
            [
                'id'    => 101,
                'title' => 'information_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
