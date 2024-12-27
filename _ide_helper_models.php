<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int|null $city_id
 * @property string $name_en
 * @property int $region_id
 * @property int|null $company_id
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static find(int $id)
 * @property int $id
 * @property string $name
 * @property string|null $avatar_url
 * @property int $owner_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Customer> $customers
 * @property-read int|null $customers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Employee> $employees
 * @property-read int|null $employees_count
 * @property-read \App\Models\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstatePricing> $priceEvaluation
 * @property-read int|null $price_evaluation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Viewer> $viewers
 * @property-read int|null $viewers_count
 * @method static \Database\Factories\CompanyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer search($like)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereUserId($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee active()
 * @method static \Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee isViewer()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee ofCompany(int $company_id)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee search($like)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUserId($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $company_id
 * @property int $is_default
 * @property string $name
 * @property string $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing ofCompany(int $company_id)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstatePricing whereUpdatedAt($value)
 */
	class EstatePricing extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EstateTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EstateType whereUpdatedAt($value)
 */
	class EstateType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property float $latitude
 * @property float $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LocationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Location whereUpdatedAt($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $code
 * @property string|null $notes
 * @property bool $is_published
 * @property bool $is_online
 * @property bool $is_closed
 * @property bool $is_available
 * @property int $company_id
 * @property int|null $viewer_id
 * @property int $customer_id
 * @property int $task_status_id
 * @property int $city_id
 * @property array $location
 * @property string|null $pricing
 * @property string|null $received_at
 * @property \Illuminate\Support\Carbon|null $must_do_at
 * @property string|null $finished_at
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property string|null $order_number
 * @property string|null $suk_number
 * @property string|null $license_number
 * @property string|null $scheme_number
 * @property string|null $piece_number
 * @property string|null $age
 * @property string|null $address
 * @property string|null $district
 * @property string|null $estate_type
 * @property string|null $near_south
 * @property string|null $near_north
 * @property string|null $near_west
 * @property string|null $near_east
 * @property string|null $company_feedback
 * @property array|null $attach
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Viewer> $allowedViewers
 * @property-read int|null $allowed_viewers_count
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Customer|null $customer
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\TaskStatus|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskUpload> $uploads
 * @property-read int|null $uploads_count
 * @property-read \App\Models\Viewer|null $viewer
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task allowed(int $id)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task draft()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task equalTo(\App\Enums\TasksStatusEnum $status)
 * @method static \Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task ofCompany(int $company_id)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task online()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task published()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereAttach($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCompanyFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereEstateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereLicenseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereMustDoAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereNearEast($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereNearNorth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereNearSouth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereNearWest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task wherePieceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task wherePricing($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereSchemeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereSukNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereTaskStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereViewerId($value)
 */
	class Task extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $company_id
 * @property string $code
 * @property int $is_default
 * @property string|null $name
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus equalTo(\App\Enums\TasksStatusEnum $status)
 * @method static \Database\Factories\TaskStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus ofCompany(int $company_id)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskStatus whereUpdatedAt($value)
 */
	class TaskStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $task_id
 * @property int|null $viewer_id
 * @property mixed|null $pricing
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Task|null $task
 * @property-read \App\Models\Viewer|null $uploadedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload wherePricing($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskUpload whereViewerId($value)
 */
	class TaskUpload extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property \App\Enums\UserType $type
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\Employee|null $employee
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $personalCompanies
 * @property-read int|null $personal_companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\Viewer|null $viewer
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $device
 * @property string|null $device_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $allowedTasks
 * @property-read int|null $allowed_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ViewerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Viewer whereUserId($value)
 */
	class Viewer extends \Eloquent {}
}

