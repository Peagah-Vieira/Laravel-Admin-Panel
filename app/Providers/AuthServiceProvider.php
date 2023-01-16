<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Instructor;
use App\Models\Member;
use App\Models\Membershiptype;
use App\Models\Payment;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Policies\InstructorPolicy;
use App\Policies\MemberPolicy;
use App\Policies\MembershiptypePolicy;
use App\Policies\PaymentPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Payment::class => PaymentPolicy::class,
        Membershiptype::class => MembershiptypePolicy::class,
        Member::class => MemberPolicy::class,
        Instructor::class => InstructorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
